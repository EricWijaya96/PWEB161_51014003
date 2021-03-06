<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */
/**
* Schema.php
*
* PHP version 4, 5
*
* @category  Net
* @package   Net_LDAP
* @author    Tarjej Huse <tarjei@bergfald.no>
* @author    Jan Wagner <wagner@netsols.de>
* @author    Del <del@babel.com.au>
* @author    Benedikt Hallinger <beni@php.net>
* @copyright 2003-2007 Tarjej Huse, Jan Wagner, Del Elson, Benedikt Hallinger
* @license   http://www.gnu.org/copyleft/lesser.html LGPL
* @version   CVS: $Id: Schema.php,v 1.23 2008/10/26 15:31:06 clockwerx Exp $
* @link      http://pear.php.net/package/Net_LDAP/
*/
require_once 'PEAR.php';

/**
* Syntax definitions
*
* Please don't forget to add binary attributes to isBinary() below
* to support proper value fetching from Net_LDAP_Entry
*/
define('NET_LDAP_SYNTAX_BOOLEAN',            '1.3.6.1.4.1.1466.115.121.1.7');
define('NET_LDAP_SYNTAX_DIRECTORY_STRING',   '1.3.6.1.4.1.1466.115.121.1.15');
define('NET_LDAP_SYNTAX_DISTINGUISHED_NAME', '1.3.6.1.4.1.1466.115.121.1.12');
define('NET_LDAP_SYNTAX_INTEGER',            '1.3.6.1.4.1.1466.115.121.1.27');
define('NET_LDAP_SYNTAX_JPEG',               '1.3.6.1.4.1.1466.115.121.1.28');
define('NET_LDAP_SYNTAX_NUMERIC_STRING',     '1.3.6.1.4.1.1466.115.121.1.36');
define('NET_LDAP_SYNTAX_OID',                '1.3.6.1.4.1.1466.115.121.1.38');
define('NET_LDAP_SYNTAX_OCTET_STRING',       '1.3.6.1.4.1.1466.115.121.1.40');

/**
* Load an LDAP Schema and provide information
*
* This class takes a Subschema entry, parses this information
* and makes it available in an array. Most of the code has been
* inspired by perl-ldap( http://perl-ldap.sourceforge.net).
* You will find portions of their implementation in here.
*
* @category Net
* @package  Net_LDAP
* @author   Jan Wagner <wagner@netsols.de>
* @author   Benedikt Hallinger <beni@php.net>
* @license  http://www.gnu.org/copyleft/lesser.html LGPL
* @link     http://pear.php.net/package/Net_LDAP/
*/
class Net_LDAP_Schema extends PEAR
{
    /**
    * Map of entry types to ldap attributes of subschema entry
    *
    * @access public
    * @var array
    */
    var $types = array('attribute'        => 'attributeTypes',
                       'ditcontentrule'   => 'dITContentRules',
                       'ditstructurerule' => 'dITStructureRules',
                       'matchingrule'     => 'matchingRules',
                       'matchingruleuse'  => 'matchingRuleUse',
                       'nameform'         => 'nameForms',
                       'objectclass'      => 'objectClasses',
                       'syntax'           => 'ldapSyntaxes');

    /**
    * Array of entries belonging to this type
    *
    * @access private
    * @var array
    */
    var $_attributeTypes    = array();
    var $_matchingRules     = array();
    var $_matchingRuleUse   = array();
    var $_ldapSyntaxes      = array();
    var $_objectClasses     = array();
    var $_dITContentRules   = array();
    var $_dITStructureRules = array();
    var $_nameForms         = array();


    /**
    * hash of all fetched oids
    *
    * @access private
    * @var array
    */
    var $_oids = array();

    /**
    * Tells if the schema is initialized
    *
    * @access private
    * @var boolean
    * @see parse(), get()
    */
    var $_initialized = false;


    /**
    * constructor of the class
    *
    * @access protected
    */
    function Net_LDAP_Schema()
    {
        $this->PEAR('Net_LDAP_Error'); // default error class
    }

    /**
    * Return a hash of entries for the given type
    *
    * Returns a hash of entry for th givene type. Types may be:
    * objectclasses, attributes, ditcontentrules, ditstructurerules, matchingrules,
    * matchingruleuses, nameforms, syntaxes
    *
    * @param string $type Type to fetch
    *
    * @access public
    * @return array|Net_LDAP_Error Array or Net_LDAP_Error
    */
    function &getAll($type)
    {
        $map = array('objectclasses'     => &$this->_objectClasses,
                     'attributes'        => &$this->_attributeTypes,
                     'ditcontentrules'   => &$this->_dITContentRules,
                     'ditstructurerules' => &$this->_dITStructureRules,
                     'matchingrules'     => &$this->_matchingRules,
                     'matchingruleuses'  => &$this->_matchingRuleUse,
                     'nameforms'         => &$this->_nameForms,
                     'syntaxes'          => &$this->_ldapSyntaxes );

        $key = strtolower($type);
        $ret = ((key_exists($key, $map)) ? $map[$key] : PEAR::raiseError("Unknown type $type"));
        return $ret;
    }

    /**
    * Return a specific entry
    *
    * @param string $type Type of name
    * @param string $name Name or OID to fetch
    *
    * @access public
    * @return mixed Entry or Net_LDAP_Error
    */
    function &get($type, $name)
    {
        if ($this->_initialized) {
            $type = strtolower($type);
            if (false == key_exists($type, $this->types)) {
                return PEAR::raiseError("No such type $type");
            }

            $name     = strtolower($name);
            $type_var = &$this->{'_' . $this->types[$type]};

            if (key_exists($name, $type_var)) {
                return $type_var[$name];
            } elseif (key_exists($name, $this->_oids) && $this->_oids[$name]['type'] == $type) {
                return $this->_oids[$name];
            } else {
                return PEAR::raiseError("Could not find $type $name");
            }
        } else {
            $return = null;
            return $return;
        }
    }


    /**
    * Fetches attributes that MAY be present in the given objectclass
    *
    * @param string $oc Name or OID of objectclass
    *
    * @access public
    * @return array|Net_LDAP_Error Array with attributes or Net_LDAP_Error
    */
    function may($oc)
    {
        return $this->_getAttr($oc, 'may');
    }

    /**
    * Fetches attributes that MUST be present in the given objectclass
    *
    * @param string $oc Name or OID of objectclass
    *
    * @access public 
    * @return array|Net_LDAP_Error Array with attributes or Net_LDAP_Error
    */
    function must($oc)
    {
        return $this->_getAttr($oc, 'must');
    }

    /**
    * Fetches the given attribute from the given objectclass
    *
    * @param string $oc   Name or OID of objectclass
    * @param string $attr Name of attribute to fetch
    *
    * @access private
    * @return array|Net_LDAP_Error The attribute or Net_LDAP_Error
    */
    function _getAttr($oc, $attr)
    {
        $oc = strtolower($oc);
        if (key_exists($oc, $this->_objectClasses) && key_exists($attr, $this->_objectClasses[$oc])) {
            return $this->_objectClasses[$oc][$attr];
        } elseif (key_exists($oc, $this->_oids) &&
                $this->_oids[$oc]['type'] == 'objectclass' &&
                key_exists($attr, $this->_oids[$oc])) {
            return $this->_oids[$oc][$attr];
        } else {
            return PEAR::raiseError("Could not find $attr attributes for $oc ");
        }
    }

    /**
    * Returns the name(s) of the immediate superclass(es)
    *
    * @param string $oc Name or OID of objectclass
    *
    * @return array|Net_LDAP_Error  Array of names or Net_LDAP_Error
    */
    function superclass($oc)
    {
        $o = $this->get('objectclass', $oc);
        if (Net_LDAP::isError($o)) {
            return $o;
        }
        return (key_exists('sup', $o) ? $o['sup'] : array());
    }

    /**
    * Parses the schema of the given Subschema entry
    *
    * @param Net_LDAP_Entry &$entry Subschema entry
    *
    * @access public
    */
    function parse(&$entry)
    {
        foreach ($this->types as $type => $attr) {
            // initialize map type to entry
            $type_var          = '_' . $attr;
            $this->{$type_var} = array();

            // get values for this type
            if ($entry->exists($attr)) {
                $values = $entry->getValue($attr);
                if (is_array($values)) {
                    foreach ($values as $value) {

                        unset($schema_entry); // this was a real mess without it

                        // get the schema entry
                        $schema_entry = $this->_parse_entry($value);

                        // set the type
                        $schema_entry['type'] = $type;

                        // save a ref in $_oids
                        $this->_oids[$schema_entry['oid']] = &$schema_entry;

                        // save refs for all names in type map
                        $names = $schema_entry['aliases'];
                        array_push($names, $schema_entry['name']);
                        foreach ($names as $name) {
                            $this->{$type_var}[strtolower($name)] = &$schema_entry;
                        }
                    }
                }
            }
        }
        $this->_initialized = true;
    }

    /**
    * parses an attribute value into a schema entry
    *
    * @param string $value Attribute value
    *
    * @access private
    * @return array|false Schema entry array or false
    */
    function &_parse_entry($value)
    {
        // tokens that have no value associated
        $noValue = array('single-value',
                         'obsolete',
                         'collective',
                         'no-user-modification',
                         'abstract',
                         'structural',
                         'auxiliary');

        // tokens that can have multiple values
        $multiValue = array('must', 'may', 'sup');

        $schema_entry = array('aliases' => array()); // initilization

        $tokens = $this->_tokenize($value); // get an array of tokens

        // remove surrounding brackets
        if ($tokens[0] == '(') array_shift($tokens);
        if ($tokens[count($tokens) - 1] == ')') array_pop($tokens); // -1 doesnt work on arrays :-(

        $schema_entry['oid'] = array_shift($tokens); // first token is the oid

        // cycle over the tokens until none are left
        while (count($tokens) > 0) {
            $token = strtolower(array_shift($tokens));
            if (in_array($token, $noValue)) {
                $schema_entry[$token] = 1; // single value token
            } else {
                // this one follows a string or a list if it is multivalued
                if (($schema_entry[$token] = array_shift($tokens)) == '(') {
                    // this creates the list of values and cycles through the tokens
                    // until the end of the list is reached ')'
                    $schema_entry[$token] = array();
                    while ($tmp = array_shift($tokens)) {
                        if ($tmp == ')') break;
                        if ($tmp != '$') array_push($schema_entry[$token], $tmp);
                    }
                }
                // create a array if the value should be multivalued but was not
                if (in_array($token, $multiValue) && !is_array($schema_entry[$token])) {
                    $schema_entry[$token] = array($schema_entry[$token]);
                }
            }
        }
        // get max length from syntax
        if (key_exists('syntax', $schema_entry)) {
            if (preg_match('/{(\d+)}/', $schema_entry['syntax'], $matches)) {
                $schema_entry['max_length'] = $matches[1];
            }
        }
        // force a name
        if (empty($schema_entry['name'])) {
            $schema_entry['name'] = $schema_entry['oid'];
        }
        // make one name the default and put the other ones into aliases
        if (is_array($schema_entry['name'])) {
            $aliases                 = $schema_entry['name'];
            $schema_entry['name']    = array_shift($aliases);
            $schema_entry['aliases'] = $aliases;
        }
        return $schema_entry;
    }

    /**
    * tokenizes the given value into an array of tokens
    *
    * @param string $value String to parse
    *
    * @access private
    * @return array Array of tokens
    */
    function _tokenize($value)
    {
        $tokens  = array();       // array of tokens
        $matches = array();       // matches[0] full pattern match, [1,2,3] subpatterns

        // this one is taken from perl-ldap, modified for php
        $pattern = "/\s* (?:([()]) | ([^'\s()]+) | '((?:[^']+|'[^\s)])*)') \s*/x";

        /**
         * This one matches one big pattern wherin only one of the three subpatterns matched
         * We are interested in the subpatterns that matched. If it matched its value will be
         * non-empty and so it is a token. Tokens may be round brackets, a string, or a string
         * enclosed by '
         */
        preg_match_all($pattern, $value, $matches);

        for ($i = 0; $i < count($matches[0]); $i++) {     // number of tokens (full pattern match)
            for ($j = 1; $j < 4; $j++) {                  // each subpattern
                if (null != trim($matches[$j][$i])) {     // pattern match in this subpattern
                    $tokens[$i] = trim($matches[$j][$i]); // this is the token
                }
            }
        }
        return $tokens;
    }

    /**
    * Returns wether a attribute syntax is binary or not
    *
    * This method gets used by Net_LDAP_Entry to decide which
    * PHP function needs to be used to fetch the value in the
    * proper format (e.g. binary or string)
    *
    * @param string $attribute The name of the attribute (eg.: 'sn')
    *
    * @access public
    * @return boolean
    */
    function isBinary($attribute)
    {
        $return = false; // default to false

        // This list contains all syntax that should be treaten as
        // containing binary values
        // The Syntax Definitons go into constants at the top of this page
        $syntax_binary = array(
                           NET_LDAP_SYNTAX_OCTET_STRING,
                           NET_LDAP_SYNTAX_JPEG
                         );

        // Check Syntax
        $attr_s = $this->get('attribute', $attribute);
        if (Net_LDAP::isError($attr_s)) {
            // Attribute not found in schema
            $return = false; // consider attr not binary
        } elseif (isset($attr_s['syntax']) && in_array($attr_s['syntax'], $syntax_binary)) {
            // Syntax is defined as binary in schema
            $return = true;
        } else {
            // Syntax not defined as binary, or not found
            // if attribute is a subtype, check superior attribute syntaxes
            if (isset($attr_s['sup'])) {
                foreach ($attr_s['sup'] as $superattr) {
                    $return = $this->isBinary($superattr);
                    if ($return) {
                        break; // stop checking parents since we are binary
                    }
                }
            }
        }

        return $return;
    }
}
?>

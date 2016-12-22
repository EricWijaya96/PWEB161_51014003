# This file is auto-generated by the Perl DateTime Suite time zone
# code generator (0.07) This code generator comes with the
# DateTime::TimeZone module distribution in the tools/ directory

#
# Generated from /tmp/PHvstgqvGl/africa.  Olson data version 2012e
#
# Do not edit this file directly.
#
package DateTime::TimeZone::Africa::Addis_Ababa;
{
  $DateTime::TimeZone::Africa::Addis_Ababa::VERSION = '1.48';
}

use strict;

use Class::Singleton 1.03;
use DateTime::TimeZone;
use DateTime::TimeZone::OlsonDB;

@DateTime::TimeZone::Africa::Addis_Ababa::ISA = ( 'Class::Singleton', 'DateTime::TimeZone' );

my $spans =
[
    [
DateTime::TimeZone::NEG_INFINITY,
58980000312,
DateTime::TimeZone::NEG_INFINITY,
58980009600,
9288,
0,
'LMT'
    ],
    [
58980000312,
61073472280,
58980009632,
61073481600,
9320,
0,
'ADMT'
    ],
    [
61073472280,
DateTime::TimeZone::INFINITY,
61073483080,
DateTime::TimeZone::INFINITY,
10800,
0,
'EAT'
    ],
];

sub olson_version { '2012e' }

sub has_dst_changes { 0 }

sub _max_year { 2022 }

sub _new_instance
{
    return shift->_init( @_, spans => $spans );
}



1;

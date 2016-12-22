# This file is auto-generated by the Perl DateTime Suite time zone
# code generator (0.07) This code generator comes with the
# DateTime::TimeZone module distribution in the tools/ directory

#
# Generated from /tmp/PHvstgqvGl/asia.  Olson data version 2012e
#
# Do not edit this file directly.
#
package DateTime::TimeZone::Asia::Bishkek;
{
  $DateTime::TimeZone::Asia::Bishkek::VERSION = '1.48';
}

use strict;

use Class::Singleton 1.03;
use DateTime::TimeZone;
use DateTime::TimeZone::OlsonDB;

@DateTime::TimeZone::Asia::Bishkek::ISA = ( 'Class::Singleton', 'DateTime::TimeZone' );

my $spans =
[
    [
DateTime::TimeZone::NEG_INFINITY,
60694513296,
DateTime::TimeZone::NEG_INFINITY,
60694531200,
17904,
0,
'LMT'
    ],
    [
60694513296,
60888135600,
60694531296,
60888153600,
18000,
0,
'FRUT'
    ],
    [
60888135600,
62490592800,
60888157200,
62490614400,
21600,
0,
'FRUT'
    ],
    [
62490592800,
62506400400,
62490618000,
62506425600,
25200,
1,
'FRUST'
    ],
    [
62506400400,
62522128800,
62506422000,
62522150400,
21600,
0,
'FRUT'
    ],
    [
62522128800,
62537936400,
62522154000,
62537961600,
25200,
1,
'FRUST'
    ],
    [
62537936400,
62553664800,
62537958000,
62553686400,
21600,
0,
'FRUT'
    ],
    [
62553664800,
62569472400,
62553690000,
62569497600,
25200,
1,
'FRUST'
    ],
    [
62569472400,
62585287200,
62569494000,
62585308800,
21600,
0,
'FRUT'
    ],
    [
62585287200,
62601019200,
62585312400,
62601044400,
25200,
1,
'FRUST'
    ],
    [
62601019200,
62616744000,
62601040800,
62616765600,
21600,
0,
'FRUT'
    ],
    [
62616744000,
62632468800,
62616769200,
62632494000,
25200,
1,
'FRUST'
    ],
    [
62632468800,
62648193600,
62632490400,
62648215200,
21600,
0,
'FRUT'
    ],
    [
62648193600,
62663918400,
62648218800,
62663943600,
25200,
1,
'FRUST'
    ],
    [
62663918400,
62679643200,
62663940000,
62679664800,
21600,
0,
'FRUT'
    ],
    [
62679643200,
62695368000,
62679668400,
62695393200,
25200,
1,
'FRUST'
    ],
    [
62695368000,
62711092800,
62695389600,
62711114400,
21600,
0,
'FRUT'
    ],
    [
62711092800,
62726817600,
62711118000,
62726842800,
25200,
1,
'FRUST'
    ],
    [
62726817600,
62742542400,
62726839200,
62742564000,
21600,
0,
'FRUT'
    ],
    [
62742542400,
62758267200,
62742567600,
62758292400,
25200,
1,
'FRUST'
    ],
    [
62758267200,
62773992000,
62758288800,
62774013600,
21600,
0,
'FRUT'
    ],
    [
62773992000,
62790321600,
62774017200,
62790346800,
25200,
1,
'FRUST'
    ],
    [
62790321600,
62806046400,
62790343200,
62806068000,
21600,
0,
'FRUT'
    ],
    [
62806046400,
62819265600,
62806068000,
62819287200,
21600,
1,
'FRUST'
    ],
    [
62819265600,
62838702000,
62819283600,
62838720000,
18000,
0,
'KGT'
    ],
    [
62838702000,
62853213600,
62838723600,
62853235200,
21600,
1,
'KGST'
    ],
    [
62853213600,
62870151600,
62853231600,
62870169600,
18000,
0,
'KGT'
    ],
    [
62870151600,
62884663200,
62870173200,
62884684800,
21600,
1,
'KGST'
    ],
    [
62884663200,
62901601200,
62884681200,
62901619200,
18000,
0,
'KGT'
    ],
    [
62901601200,
62916112800,
62901622800,
62916134400,
21600,
1,
'KGST'
    ],
    [
62916112800,
62933050800,
62916130800,
62933068800,
18000,
0,
'KGT'
    ],
    [
62933050800,
62947562400,
62933072400,
62947584000,
21600,
1,
'KGST'
    ],
    [
62947562400,
62964500400,
62947580400,
62964518400,
18000,
0,
'KGT'
    ],
    [
62964500400,
62979616800,
62964522000,
62979638400,
21600,
1,
'KGST'
    ],
    [
62979616800,
62995354200,
62979634800,
62995372200,
18000,
0,
'KGT'
    ],
    [
62995354200,
63013494600,
62995375800,
63013516200,
21600,
1,
'KGST'
    ],
    [
63013494600,
63026803800,
63013512600,
63026821800,
18000,
0,
'KGT'
    ],
    [
63026803800,
63044944200,
63026825400,
63044965800,
21600,
1,
'KGST'
    ],
    [
63044944200,
63058253400,
63044962200,
63058271400,
18000,
0,
'KGT'
    ],
    [
63058253400,
63076998600,
63058275000,
63077020200,
21600,
1,
'KGST'
    ],
    [
63076998600,
63089703000,
63077016600,
63089721000,
18000,
0,
'KGT'
    ],
    [
63089703000,
63108448200,
63089724600,
63108469800,
21600,
1,
'KGST'
    ],
    [
63108448200,
63121152600,
63108466200,
63121170600,
18000,
0,
'KGT'
    ],
    [
63121152600,
63139897800,
63121174200,
63139919400,
21600,
1,
'KGST'
    ],
    [
63139897800,
63153207000,
63139915800,
63153225000,
18000,
0,
'KGT'
    ],
    [
63153207000,
63171347400,
63153228600,
63171369000,
21600,
1,
'KGST'
    ],
    [
63171347400,
63184656600,
63171365400,
63184674600,
18000,
0,
'KGT'
    ],
    [
63184656600,
63202797000,
63184678200,
63202818600,
21600,
1,
'KGST'
    ],
    [
63202797000,
63216106200,
63202815000,
63216124200,
18000,
0,
'KGT'
    ],
    [
63216106200,
63234851400,
63216127800,
63234873000,
21600,
1,
'KGST'
    ],
    [
63234851400,
63247555800,
63234869400,
63247573800,
18000,
0,
'KGT'
    ],
    [
63247555800,
63259466400,
63247577400,
63259488000,
21600,
1,
'KGST'
    ],
    [
63259466400,
DateTime::TimeZone::INFINITY,
63259488000,
DateTime::TimeZone::INFINITY,
21600,
0,
'KGT'
    ],
];

sub olson_version { '2012e' }

sub has_dst_changes { 25 }

sub _max_year { 2022 }

sub _new_instance
{
    return shift->_init( @_, spans => $spans );
}



1;


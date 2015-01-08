<?php
# +------------------------------------------------------------------+
# |             ____ _               _        __  __ _  __           |
# |            / ___| |__   ___  ___| | __   |  \/  | |/ /           |
# |           | |   | '_ \ / _ \/ __| |/ /   | |\/| | ' /            |
# |           | |___| | | |  __/ (__|   <    | |  | | . \            |
# |            \____|_| |_|\___|\___|_|\_\___|_|  |_|_|\_\           |
# |                                                                  |
# | Copyright Mathias Kettner 2013             mk@mathias-kettner.de |
# +------------------------------------------------------------------+
#
# This file is part of Check_MK.
# The official homepage is at http://mathias-kettner.de/check_mk.
#
# check_mk is free software;  you can redistribute it and/or modify it
# under the  terms of the  GNU General Public License  as published by
# the Free Software Foundation in version 2.  check_mk is  distributed
# in the hope that it will be useful, but WITHOUT ANY WARRANTY;  with-
# out even the implied warranty of  MERCHANTABILITY  or  FITNESS FOR A
# PARTICULAR PURPOSE. See the  GNU General Public License for more de-
# ails.  You should have  received  a copy of the  GNU  General Public
# License along with GNU Make; see the file  COPYING.  If  not,  write
# to the Free Software Foundation, Inc., 51 Franklin St,  Fifth Floor,
# Boston, MA 02110-1301 USA.

# HTML COLORS

$RED = "FF0000";
$YELLOW = "FFFF00";
$CYAN = "00FFFF";
$BLUE = "0000FF";
$DARK_BLUE = "0000A0";
$LIGHT_BLUE = "ADD8E6";
$PURPLE = "800080";
$LIME = "00FF00";
$MAGENTA = "FF00FF";
$SILVER = "C0C0C0";
$GREY = "808080";
$ORANGE = "FFA500";
$BROWN = "A52A2A";
$MAROON = "800000";
$GREEN = "00cf00";
$OLIVE = "808000";

$WARN_COLOR = "$YELLOW";
$CRIT_COLOR = "$RED";

$var1 = "innodb_data_reads";
$var1_description = "File Reads";
$var1_color = "$CYAN";
$var2 = "innodb_data_writes";
$var2_description = "File Writes";
$var2_color = "$BLUE";
$var3 = "innodb_log_writes";
$var3_description = "Log Writes";
$var3_color = "$DARK_BLUE";
$var4 = "innodb_data_fsyncs";
$var4_description = "File Fsyncs";
$var4_color = "$LIGHT_BLUE";

# The number of data source various due to different
# settings (such as averaging). We rather work with names
# than with numbers.
$RRD = array();
foreach ($NAME as $i => $n) {
    $RRD[$n] = "$RRDFILE[$i]:$DS[$i]:MAX";
    $WARN[$n] = $WARN[$i];
    $CRIT[$n] = $CRIT[$i];
    $MIN[$n]  = $MIN[$i];
    $MAX[$n]  = $MAX[$i];
}

$opt[1] = "--vertical-label 'Throughput (MB/s)' -l0  -u 1 --title \"InnoDB I/O for $hostname\" ";

$def[1] =  ""
         . "DEF:$var1=$RRD[$var1] "
         . "LINE:$var1#$var1_color:\"$var1_description\" "
         . "GPRINT:$var1:LAST:\"%6.2lf last\" "
         . "GPRINT:$var1:AVERAGE:\"%6.2lf avg\" "
         . "GPRINT:$var1:MAX:\"%6.2lf max\\n\" "

         . "DEF:$var2=$RRD[$var2] "
         . "LINE:$var2#$var2_color:\"$var2_description\" "
         . "GPRINT:$var2:LAST:\"%6.2lf last\" "
         . "GPRINT:$var2:AVERAGE:\"%6.2lf avg\" "
         . "GPRINT:$var2:MAX:\"%6.2lf max\\n\" "

         . "DEF:$var3=$RRD[$var3] "
         . "LINE:$var3#$var3_color:\"$var3_description\" "
         . "GPRINT:$var3:LAST:\"%6.2lf last\" "
         . "GPRINT:$var3:AVERAGE:\"%6.2lf avg\" "
         . "GPRINT:$var3:MAX:\"%6.2lf max\\n\" "

         . "DEF:$var4=$RRD[$var4] "
         . "LINE:$var4#$var4_color:\"$var4_description\" "
         . "GPRINT:$var4:LAST:\"%6.2lf last\" "
         . "GPRINT:$var4:AVERAGE:\"%6.2lf avg\" "
         . "GPRINT:$var4:MAX:\"%6.2lf max\\n\" "

         . "";

if ($WARN[1]) {
    $def[1] .= ""
         . "HRULE:$WARN[1]#$WARN_COLOR "
         . "HRULE:$CRIT[1]#$CRIT_COLOR "
         . "";
}

?>

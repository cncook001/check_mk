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

$var1 = "questions";
$var1_description = "Questions";
$var1_color = "$CYAN";
$var2 = "com_select";
$var2_description = "Com Select";
$var2_color = "$BLUE";
$var3 = "com_delete";
$var3_description = "Com Delete";
$var3_color = "$DARK_BLUE";
$var4 = "com_insert";
$var4_description = "Com Insert";
$var4_color = "$LIGHT_BLUE";
$var5 = "com_update";
$var5_description = "Com Update";
$var5_color = "$PURPLE";
$var6 = "com_replace";
$var6_description = "Com Replace";
$var6_color = "$LIME";
$var7 = "com_load";
$var7_description = "Com Load";
$var7_color = "$MAGENTA";
$var8 = "com_delete_multi";
$var8_description = "Com Delete Multi";
$var8_color = "$SILVER";
$var9 = "com_insert_select";
$var9_description = "Com Insert Select";
$var9_color = "$GREY";
$var10 = "com_update_multi";
$var10_description = "Com Update Multi";
$var10_color = "$ORANGE";
$var11 = "com_replace_select";
$var11_description = "Com Replace Select";
$var11_color = "$BROWN";
$var12 = "com_commit";
$var12_description = "Com Commit";
$var12_color = "$MAROON";
$var13 = "com_rollback";
$var13_description = "Com Rollback";
$var13_color = "$GREEN";

# The number of data source various due to different
# settings (such as averaging). We rather work with names
# than with numbers.
$RRD = array();
foreach ($NAME as $i => $n) {
    $RRD[$n]  = "$RRDFILE[$i]:$DS[$i]:MAX";
    $WARN[$n] = $WARN[$i];
    $CRIT[$n] = $CRIT[$i];
    $MIN[$n]  = $MIN[$i];
    $MAX[$n]  = $MAX[$i];
}

$opt[1] = "--vertical-label 'Per Second' -l0  -u 1 --title \"MySQL Command Counters for $hostname\" ";

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

         . "DEF:$var5=$RRD[$var5] "
         . "LINE:$var5#$var5_color:\"$var5_description\" "
         . "GPRINT:$var5:LAST:\"%6.2lf last\" "
         . "GPRINT:$var5:AVERAGE:\"%6.2lf avg\" "
         . "GPRINT:$var5:MAX:\"%6.2lf max\\n\" "

         . "DEF:$var6=$RRD[$var6] "
         . "LINE:$var6#$var6_color:\"$var6_description\" "
         . "GPRINT:$var6:LAST:\"%6.2lf last\" "
         . "GPRINT:$var6:AVERAGE:\"%6.2lf avg\" "
         . "GPRINT:$var6:MAX:\"%6.2lf max\\n\" "

         . "DEF:$var7=$RRD[$var7] "
         . "LINE:$var7#$var7_color:\"$var7_description\" "
         . "GPRINT:$var7:LAST:\"%6.2lf last\" "
         . "GPRINT:$var7:AVERAGE:\"%6.2lf avg\" "
         . "GPRINT:$var7:MAX:\"%6.2lf max\\n\" "

         . "DEF:$var8=$RRD[$var8] "
         . "LINE:$var8#$var8_color:\"$var8_description\" "
         . "GPRINT:$var8:LAST:\"%6.2lf last\" "
         . "GPRINT:$var8:AVERAGE:\"%6.2lf avg\" "
         . "GPRINT:$var8:MAX:\"%6.2lf max\\n\" "

         . "DEF:$var9=$RRD[$var9] "
         . "LINE:$var9#$var9_color:\"$var9_description\" "
         . "GPRINT:$var9:LAST:\"%6.2lf last\" "
         . "GPRINT:$var9:AVERAGE:\"%6.2lf avg\" "
         . "GPRINT:$var9:MAX:\"%6.2lf max\\n\" "

         . "DEF:$var10=$RRD[$var10] "
         . "LINE:$var10#$var10_color:\"$var10_description\" "
         . "GPRINT:$var10:LAST:\"%6.2lf last\" "
         . "GPRINT:$var10:AVERAGE:\"%6.2lf avg\" "
         . "GPRINT:$var10:MAX:\"%6.2lf max\\n\" "

         . "DEF:$var11=$RRD[$var11] "
         . "LINE:$var11#$var11_color:\"$var11_description\" "
         . "GPRINT:$var11:LAST:\"%6.2lf last\" "
         . "GPRINT:$var11:AVERAGE:\"%6.2lf avg\" "
         . "GPRINT:$var11:MAX:\"%6.2lf max\\n\" "

         . "DEF:$var12=$RRD[$var12] "
         . "LINE:$var4#$var12_color:\"$var12_description\" "
         . "GPRINT:$var12:LAST:\"%6.2lf last\" "
         . "GPRINT:$var12:AVERAGE:\"%6.2lf avg\" "
         . "GPRINT:$var12:MAX:\"%6.2lf max\\n\" "

         . "DEF:$var13=$RRD[$var13] "
         . "LINE:$var13#$var13_color:\"$var13_description\" "
         . "GPRINT:$var13:LAST:\"%6.2lf last\" "
         . "GPRINT:$var13:AVERAGE:\"%6.2lf avg\" "
         . "GPRINT:$var13:MAX:\"%6.2lf max\\n\" "

         . "";

if ($WARN[1]) {
    $def[1] .= ""
         . "HRULE:$WARN[1]#$WARN_COLOR "
         . "HRULE:$CRIT[1]#$CRIT_COLOR "
         . "";
}

?>

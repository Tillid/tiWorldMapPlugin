<?php
include_component('tiWorldMap', 'worldmapjs', array());
use_javascript('/tiWorldMapPlugin/js/jquery.vector-map.js');
use_stylesheet('/tiWorldMapPlugin/css/worldmap.css');
use_stylesheet('/tiWorldMapPlugin/css/jquery.vector-map.css');

if (!isset($width))
{
    if (($w = sfConfig::get('app_tiworldmapplugin_width')))
        $width = $w;
    else
        $width = "500px";
}

if (!isset($height))
{
    if (($h = sfConfig::get('app_tiworldmapplugin_height')))
        $height = $h;
    else
        $height = "300px";
}

if (!isset($class))
{
    if (($c = sfConfig::get('app_tiworldmapplugin_class')))
        $class = $c;
    else
        $class = "tiWorldMapPlugin_map";
}

if (!isset($backgroundColor))
{
    if (($b = sfConfig::get('app_tiworldmapplugin_backgroundcolor')))
        $backgroundColor = $b;
    else
        $backgroundColor = '#808080';
}

if (!isset($color))
{
    if (($c = sfConfig::get('app_tiworldmapplugin_color')))
        $color = $c;
    else
        $color = '#FFFFFF';
}

if (!isset($hoverColor))
{
    if (($h = sfConfig::get('app_tiworldmapplugin_hovercolor')))
        $hoverColor = $h;
    else
        $hoverColor = '#000000';
}

if (!isset($scaleColorStart))
{
    if (($s = sfConfig::get('app_tiworldmapplugin_scalecolorstart')))
        $scaleColorStart = $s;
    else
        $scaleColorStart = '#FFFFFF';
}

if (!isset($scaleColorEnd))
{
    if (($s = sfConfig::get('app_tiworldmapplugin_scalecolorend')))
        $scaleColorEnd = $s;
    else
        $scaleColorEnd = '#FF0000';
}

if (!isset($normalizeFunction))
{
    if (($n = sfConfig::get('app_tiworldmapplugin_normalizefunction')))
        $normalizeFunction = $n;
    else
        $normalizeFunction = 'linear';
}

if (!isset($zoomStep))
{
    if (($z = sfConfig::get('app_tiworldmapplugin_zoomstep')))
        $zoomStep = $z;
    else
        $zoomStep = 1.4;
}

if (!isset($zoomMaxStep))
{
    if (($z = sfConfig::get('app_tiworldmapplugin_zoommaxstep')))
        $zoomMaxStep = $z < 1 ? 1 : $z;
    else
        $zoomMaxStep = 4;
}

if (!isset($zoomCurStep))
{
    if (($z = sfConfig::get('app_tiworldmapplugin_zoomcurstep')))
    {
        $zoomCurStep = $z < 1 ? 1 : $z;
        if ($zoomCurStep > $zoomMaxStep)
            $zoomCurStep = 1;
    }
    else
        $zoomCurStep = 1;
}

if (!isset($onLabelShow) && ($func = sfConfig::get('app_tiworldmapplugin_onlabelshow')))
    $onLabelShow = $func;

if (!isset($onRegionOver) && ($func = sfConfig::get('app_tiworldmapplugin_onregionover')))
    $onRegionOver = $func;

if (!isset($onRegionOut) && ($func = sfConfig::get('app_tiworldmapplugin_onregionout')))
    $onRegionOut = $func;

if (!isset($onRegionClick) && ($func = sfConfig::get('app_tiworldmapplugin_onregionclick')))
    $onRegionClick = $func;

?>

<div id="map" class="<?php echo $class;?>" style="width: <?php echo $width;?>; height: <?php echo $height;?>;"></div>

<script type="text/javascript">
    var colorValues = { };
    var data = { };
<?php 
if (isset($colors))
{
    echo "colorValues = {";
    $first = 1;
    foreach ($colors as $code => $value)
    {
        if (!$first)
            echo ", ";
        echo $code." : '".$value."'";
        $first = 0;
    }
    echo "};\n\n";
}

if (isset($values))
{
    echo "data = {";
    $first = 1;
    foreach ($values as $code => $value)
    {
        if (!$first)
            echo ", ";
        echo $code." : '".$value."'";
        $first = 0;
    }
    echo "};\n\n";
}
?>
$(function(){
    $('#map').vectorMap({
    backgroundColor: '<?php echo $backgroundColor; ?>',
    color: '<?php echo $color; ?>',
    hoverColor: '<?php echo $hoverColor; ?>',
    scaleColors: ['<?php echo $scaleColorStart;?>', '<?php echo $scaleColorEnd; ?>' ],
    normalizeFunction: '<?php echo $normalizeFunction ;?>',
    zoomStep: <?php echo $zoomStep;?>,
    zoomMaxStep: <?php echo $zoomMaxStep;?>,
    zoomCurStep: <?php echo $zoomCurStep;?>,
    colors: colorValues
    <?php echo (isset($onLabelShow) ? ", onLabelShow: $onLabelShow" : '');?>
    <?php echo (isset($onRegionOver) ? ", onRegionOver: $onRegionOver" : '');?>
    <?php echo (isset($onRegionOut) ? ", onRegionOut: $onRegionOut" : '');?>
    <?php echo (isset($onRegionClick) ? ", onRegionClick: $onRegionClick" : '');?>
    <?php echo (isset($values) ? ", values: data" : '');?>
    });
});

function getNameFromCode(code)
{
    return (WorldMap['world_en']["pathes"][code]["name"]);
}
</script>
<br/><br/>
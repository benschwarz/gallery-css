<?php
    header("Content-type: text/css", true);
    $n = isset($_GET['n']) ? $_GET['n'] : 5;
    $p = floatval(100/$n);
    $p2 = $p/3.5;
?>

.gallery .control-operator:target ~ .controls .control-button {
color: #ccc;
color: rgba(255, 255, 255, 0.4);
}

.gallery .control-button:first-of-type,
<?php
    for($i=1; $i<=$n; $i++)
    echo ".gallery .control-operator:nth-of-type({$i}):target ~ .controls .control-button:nth-of-type({$i})".($i<$n?",\n":"");
?>
 {
color: white;
color: rgba(255, 255, 255, 0.8);
}

.gallery figure {
margin: 0;
}

.gallery .item:first-of-type {
position: static;
pointer-events: auto;
opacity: 1;
}

.gallery .item {
position: absolute;
top: 0;
left: 0;
width: 100%;
height: 100%;
pointer-events: none;
opacity: 0;
-webkit-transition: opacity .5s;
-o-transition: opacity .5s;
transition: opacity .5s;
}

.gallery .control-operator {
display: none;
}

.gallery .control-operator:target ~ .item {
pointer-events: none;
opacity: 0;
-webkit-animation: none;
-o-animation: none;
animation: none;
}

.gallery .control-operator:target ~ .controls .control-button {
-webkit-animation: none;
-o-animation: none;
animation: none;
}


@-webkit-keyframes controlAnimation-<?php echo $n; ?> {
0% {
color: #ccc;
color: rgba(255, 255, 255, 0.4);
}

<?php printf("%g%%, %g%%", round($p2, 1), round($p, 1)); ?> {
color: white;
color: rgba(255, 255, 255, 0.8);
}

<?php printf("%g%%", round($p+$p2, 1)); ?>, 100% {
color: #ccc;
color: rgba(255, 255, 255, 0.4);
}
}

@-o-keyframes controlAnimation-<?php echo $n; ?> {
0% {
color: #ccc;
color: rgba(255, 255, 255, 0.4);
}

<?php printf("%g%%, %g%%", round($p2, 1), round($p, 1)); ?> {
color: white;
color: rgba(255, 255, 255, 0.8);
}

<?php printf("%g%%", round($p+$p2, 1)); ?>, 100% {
color: #ccc;
color: rgba(255, 255, 255, 0.4);
}
}

@keyframes controlAnimation-<?php echo $n; ?> {
0% {
color: #ccc;
color: rgba(255, 255, 255, 0.4);
}

<?php printf("%g%%, %g%%", round($p2, 1), round($p, 1)); ?> {
color: white;
color: rgba(255, 255, 255, 0.8);
}

<?php printf("%g%%", round($p+$p2, 1)); ?>, 100% {
color: #ccc;
color: rgba(255, 255, 255, 0.4);
}
}

@-webkit-keyframes galleryAnimation-<?php echo $n; ?> {
0% {
opacity: 0;
}

<?php printf("%g%%, %g%%", round($p2, 1), round($p, 1)); ?> {
opacity: 1;
}

<?php printf("%g%%", round($p+$p2, 1)); ?>, 100% {
opacity: 0;
}
}

@-o-keyframes galleryAnimation-<?php echo $n; ?> {
0% {
opacity: 0;
}

<?php printf("%g%%, %g%%", round($p2, 1), round($p, 1)); ?> {
opacity: 1;
}

<?php printf("%g%%", round($p+$p2, 1)); ?>, 100% {
opacity: 0;
}
}

@keyframes galleryAnimation-<?php echo $n; ?> {
0% {
opacity: 0;
}

<?php printf("%g%%, %g%%", round($p2, 1), round($p, 1)); ?> {
opacity: 1;
}

<?php printf("%g%%", round($p+$p2, 1)); ?>, 100% {
opacity: 0;
}
}

<?php
    for($i=1; $i<=$n; $i++)
    echo ".gallery .control-operator:nth-of-type({$i}):target ~ .item:nth-of-type({$i}) {\npointer-events: auto;\nopacity: 1;\n}\n\n";
?>

.items-<?php echo $n; ?>.autoplay .control-button {
-webkit-animation: controlAnimation-<?php echo $n; ?> <?php printf("%gs", 7*$n); ?> infinite;
-o-animation: controlAnimation-<?php echo $n; ?> <?php printf("%gs", 7*$n); ?> infinite;
animation: controlAnimation-<?php echo $n; ?> <?php printf("%gs", 7*$n); ?> infinite;
}

.items-<?php echo $n; ?>.autoplay .item {
-webkit-animation: galleryAnimation-<?php echo $n; ?> <?php printf("%gs", 7*$n); ?> infinite;
-o-animation: galleryAnimation-<?php echo $n; ?> <?php printf("%gs", 7*$n); ?> infinite;
animation: galleryAnimation-<?php echo $n; ?> <?php printf("%gs", 7*$n); ?> infinite;
}

<?php
    for($i=1; $i<=$n; $i++):
        $s = ($i-1)*7-2;
        echo ".items-{$n} .control-button:nth-of-type({$i}),\n.items-{$n} .item:nth-of-type({$i}) {\n-webkit-animation-delay: {$s}s;\n-o-animation-delay: {$s}s;\nanimation-delay: {$s}s;\n}\n\n";
    endfor;
?>

.gallery .control-button {
color: #ccc;
color: rgba(255, 255, 255, 0.4);
}

.gallery .control-button:hover {
color: white;
color: rgba(255, 255, 255, 0.8);
}

/*
Theme controls how everything looks in Gallery CSS.
*/

.gallery {
position: relative;
}

.gallery .item {
height: 400px;
overflow: hidden;
text-align: center;
background: transparent;
}

.gallery .controls {
position: absolute;
bottom: 0;
width: 100%;
text-align: center;
}

.gallery .control-button {
display: inline-block;
margin: 0 .02em;
font-size: 3em;
text-align: center;
text-decoration: none;
-webkit-transition: color .1s;
-o-transition: color .1s;
transition: color .1s;
}

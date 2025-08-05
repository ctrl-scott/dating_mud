<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<?php
function generate_npc($region_stats) {
    $npc = [
        "name" => "Taylor",
        "attraction" => rand(1, 100),
        "trust" => rand(1, 100),
        "personality" => array_rand(["shy", "bold", "mysterious", "needy"]),
        "health" => $region_stats['std_health_score'] + rand(-10, 10)
    ];
    return $npc;
}
?>
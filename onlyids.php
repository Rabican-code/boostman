<?php
$data['collections'] = [
    ["id" => 1, "name" => "superman"],
    ["id" => 2, "name" => "batman"],
    ["id" => 3, "name" => "robin"],
];

foreach ($data['collections'] as $ids) {

    $showids = $ids['id'];
    $data['onlyIds'][] = ($showids);

}
$numbers = [2, 4, 6];
$onlyIds = $data['onlyIds'];

foreach ($onlyIds as $onlyId) {

    if (!in_array($onlyId, $numbers)) {
            // $onlyIds = array_diff($onlyIds, array($number));
        print_r([$onlyId]);
    }
}

// print_r($onlyIds);
// print_r($a);

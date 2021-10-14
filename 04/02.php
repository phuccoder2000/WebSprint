<?php
$menu = array();
$menu[] = array('id' => 1, 'name' => 'Home', 'parent' => 0);
$menu[] = array('id' => 2, 'name' => 'About', 'parent' => 0);
$menu[] = array('id' => 3, 'name' => 'New', 'parent' => 0);
$menu[] = array('id' => 4, 'name' => 'Product', 'parent' => 0);
$menu[] = array('id' => 5, 'name' => 'Contact', 'parent' => 0);
$menu[] = array('id' => 6, 'name' => 'Tin trong nuoc', 'parent' => 3);
$menu[] = array('id' => 7, 'name' => 'Tin nuoc ngoai', 'parent' => 3);
$menu[] = array('id' => 8, 'name' => 'Cong nghe thong tin', 'parent' => 6);
$menu[] = array('id' => 9, 'name' => 'Lap trinh', 'parent' => 6);
$menu[] = array('id' => 10, 'name' => 'IT', 'parent' => 7);
$menu[] = array('id' => 11, 'name' => 'Programming', 'parent' => 7);
$menu[] = array('id' => 12, 'name' => 'Software', 'parent' => 4);
$menu[] = array('id' => 13, 'name' => 'Mobile', 'parent' => 4);
$menu[] = array('id' => 14, 'name' => 'Anti Virus', 'parent' => 12);
$menu[] = array('id' => 15, 'name' => 'Nokia', 'parent' => 13);
$menu[] = array('id' => 16, 'name' => 'Samsung', 'parent' => 13);
$menu[] = array('id' => 17, 'name' => 'S1', 'parent' => 16);
$menu[] = array('id' => 18, 'name' => 'S1.1', 'parent' => 17);


// $menu1[] = array('id' => 1, 'name' => 'Home', 'parent' => 0, 'level' => 1);
// $menu1[] = array('id' => 2, 'name' => 'About', 'parent' => 0, 'level' => 1);
// $menu1[] = array('id' => 3, 'name' => 'New', 'parent' => 0, 'level' => 1);
// $menu1[] = array('id' => 6, 'name' => 'Tin trong nuoc', 'parent' => 3, 'level' => 2);
// $menu1[] = array('id' => 8, 'name' => 'Cong nghe thong tin', 'parent' => 6, 'level' => 3);
// $menu1[] = array('id' => 9, 'name' => 'Lap trinh', 'parent' => 6, 'level' => 3);
// $menu1[] = array('id' => 7, 'name' => 'Tin nuoc ngoai', 'parent' => 3, 'level' => 2);
// $menu1[] = array('id' => 10, 'name' => 'IT', 'parent' => 7, 'level' => 3);
// $menu1[] = array('id' => 11, 'name' => 'Programming', 'parent' => 7, 'level' => 3);
// $menu1[] = array('id' => 4, 'name' => 'Product', 'parent' => 0, 'level' => 1);
// $menu1[] = array('id' => 12, 'name' => 'Software', 'parent' => 4, 'level' => 2);
// $menu1[] = array('id' => 14, 'name' => 'Anti Virus', 'parent' => 12,'level' => 3);
// $menu1[] = array('id' => 13, 'name' => 'Mobile', 'parent' => 4, 'level' => 2);
// $menu1[] = array('id' => 15, 'name' => 'Nokia', 'parent' => 13, 'level' => 3);
// $menu1[] = array('id' => 16, 'name' => 'Samsung', 'parent' => 13, 'level' => 3);
// $menu1[] = array('id' => 17, 'name' => 'S1', 'parent' => 16, 'level' => 4);
// $menu1[] = array('id' => 18, 'name' => 'S1.1', 'parent' => 17, 'level' => 5);
// $menu1[] = array('id' => 5, 'name' => 'Contact', 'parent' => 0, 'level' => 1);


foreach ($menu as $key => $value) {
    if ($value['parent'] == 0) {
        $value['level'] = 1;
        $newarray[] = $value;
        unset($menu[$key]);


        $parent = $value['id'];
        foreach ($menu as $key_1 => $value_1) {
            if ($value_1['parent'] == $parent) {
                $value_1['level'] = $value['level'] + 1;
                $newarray[] = $value_1;
                unset($menu[$key_1]);

                $parent_1 = $value_1['id'];
                foreach ($menu as $key_2 => $value_2) {
                    if ($value_2['parent'] == $parent_1) {
                        $value_2['level'] = $value_1['level'] + 1;
                        $newarray[] = $value_2;
                        unset($menu[$key_2]);
                    }
                }
            }
        }
    }
}

echo '<pre>';
print_r($menu);
echo '</pre>';

foreach ($newarray as $key => $value) {


    if ($value['level'] == 1) {
        echo '<div style="border: solid 1px #ccc;"> + ' . $value['name'] . '</div>';
    } else {
        $padding = ($value['level'] - 1) * 25;
        $padding = 'padding-left: ' . $padding . 'px;';
        echo '<div style="border: solid 1px #ccc; ' . $padding . '"> - ' . $value['name'] . '</div>';
    }
}

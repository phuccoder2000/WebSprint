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


function recurcive($source, $parent, $level, &$newarray)
{
    if (count($source) > 0) {
        foreach ($source as $key => $value) {
            if ($value['parent'] == $parent) {
                $value['level'] = $level;
                $newarray[] = $value;
                unset($source[$key]);

                $newparent = $value['id'];
                recurcive($source, $newparent, $level + 1, $newarray);
            }
        }
    }
}


function createSelectbox($source, $name, $selected = 0, $style = null, $size = 0)
{
    $xhtml = '<select name="' . $name . '" id="selectbox" style="' . $style . '" size="' . $size . '">';
    foreach ($source as $key => $value) {

        $strSelect = '';
        if ($value['id'] == $selected) {
            $strSelect = 'selected = "selected"';
        }
        if ($value['level'] == 1) {
            $xhtml .= '<option value="' . $value['id'] . '" ' . $strSelect . '>' . $value['name'] . '</option>';
        } else {
            $name = str_repeat('&nbsp', ($value['level'] - 1) * 5) . $value['name'];

            $xhtml .= '<option value="' . $value['id'] . '"' . $strSelect . '>' .  $name . '</option>';
        }
    }
    $xhtml .= '</select>';
    return $xhtml;
}
recurcive($menu, 0, 1, $newarray);
echo createSelectbox($newarray, 'selectbox', 2);

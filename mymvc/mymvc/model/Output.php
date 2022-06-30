<?php

class Output
{

    public function __construct()
    {
    
    }
    public function __destruct()
    {
    }
    //wordt 2d array verwacht
    public function createTable($entries, $ftable, $direction)
    {
        $tableheader = false;
        $html = "";
        $html .= '<table class="' . $ftable . '">';
        foreach ($entries as $row) {
            if ($tableheader == false) {
                $html .= "<tr>";
                foreach ($row as $key => $value) {
                    $html .= "<th>{$key}</th>";
                }
                $html .= "<th>actions</th>";
                $html .= "</tr>";
                $tableheader = true;
            }
            $html .= "<tr>";
            foreach ($row as $key => $value) {
                $html .= "<td data-title='{$key}'>{$value}</td>";
            }
            $html .= "<td><a class=\"crudfunctionbutton\" href='index.php?op=".$direction."&id=" . $row['id'] .
            "'><i class=\"fa-brands fa-readme\"></i> Read</a><a class=\"crudfunctionbutton\" href='index.php?op=update&id=" . $row['id'] .
            "'><i class=\"fa-solid fa-pencil\"></i> Update</a><a class=\"crudfunctionbutton\" href='index.php?op=delete&id=" . $row['id'] .
            "'onclick=\"return confirm('Are you sure you want to delete?');\"><i class=\"fa-solid fa-trash-can\"></i> Delete</a></td>";
            $html .= "</tr>";
        }
        $html .= "</table>";
        return $html;
    }
    public function createlist($enteries){
        $html = '<ul>';
        foreach ($enteries as $entery) {
    
            foreach ($entery as  $value) {
                $html .= "<li>" . $value . "</li>";
            }
        }
        $html .= '</ul>';
        return $html;
    }
    public function createPageButton($pages){
        $html="";
        for($i = 1; $i <= $pages; $i++){
            $html.="<a href=index.php?op=readpage&page=" .$i. ">" .$i. "</a>";
            
        }
        return $html;
    }
    public function createBlog($content, $img)
{
    $html = '<div>';
    foreach ($content as $row) {
        $html .= "<div>";
        foreach ($row as $value ) {
            $sociallink = $row['social'];
            $auteur = $row['auteur'];
            $titel = $row['titel'];
            $content = $row['content'];
            $datum = $row['datum'];
            }
        }
    $html .= "<h5>$auteur</h5>";
    $html .= "<h1>$titel</h1>";
    $html .= "<p>$content</p>";
    $html .= "<h6>$datum</h6>";
    $html .= "<a href='$sociallink'>social media</a><br><br>";
    $html .= "</div>";
    foreach ($img as $imglink){
        $html .= '<img src=./view/assets/images/'.$imglink.'>';
    }
    $html .= "</div>";
    return $html;
}
}
?>
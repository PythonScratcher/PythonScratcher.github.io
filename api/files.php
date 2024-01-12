<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/98.css">
    <style>

        .tree {
            padding-left: 20px;
        }

        .tree li {
            list-style-type: none;
            position: relative;
        }

        .tree li::before {
            content: '+';
            position: absolute;
            top: 0;
            left: -15px;
            color: #f4f4f4;
            cursor: pointer;
        }

        .tree li.expanded::before {
            content: '-';
        }

        .tree ul {
            margin: 0;
            padding: 0;
            display: none;
        }

        .tree .file {
            display: inline-block;
            margin-left: 5px;
            cursor: pointer;
            color: #00a0d2;
        }
    </style>
    <title>File Tree Viewer</title>
</head>
<body>

<?php
function renderTree($dir)
{
    $files = scandir($dir);
    echo '<ul>';
    foreach ($files as $file) {
        if ($file != '.' && $file != '..') {
            $path = $dir . '/' . $file;
            echo '<li>';
            if (is_dir($path)) {
                echo '<span class="tree-node" onclick="toggleNode(this)">' . $file . '</span>';
                renderTree($path);
            } else {
                echo '<span class="file" onclick="openFile(\'' . $path . '\')">' . $file . '</span>';
            }
            echo '</li>';
        }
    }
    echo '</ul>';
}

echo '<div class="tree">';
renderTree('/files');
echo '</div>';
?>

<script>
    function toggleNode(node) {
        var parentNode = node.parentNode;
        var childList = parentNode.querySelector('ul');
        if (childList) {
            childList.style.display = childList.style.display === 'none' ? 'block' : 'none';
            parentNode.classList.toggle('expanded');
        }
    }

    function openFile(path) {
        window.location.href = path;
    }
</script>

</body>
</html>

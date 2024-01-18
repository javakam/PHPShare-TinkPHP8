<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>分页</title>
</head>
<body>

<table border="1">
    <tr>
        <th>编号</th>
        <th>姓名</th>
        <th>年龄</th>
        <th>性别</th>
    </tr>
    <?php foreach ($list as $user) {?>
    <tr>
        <td><?=$user["id"]?></td>
        <td><?=$user["name"]?></td>
        <td><?=$user["age"]?></td>
        <td><?=$user["gender"]?></td>
    </tr>
    <?php }?>
</table>
<div><?=$page?></div>

</body>
</html>
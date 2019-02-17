<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        table {
            border-collapse: collapse;
            border-spacing: 0;
            width: 100%;
            border: 1px solid #ddd;
        }
        body {
            margin: 50px;
        }

        th, td {
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even){background-color: #f2f2f2}
    </style>
</head>
<body>
<div class="container" style="margin: 40px;">
    <h2><?php echo $title;echo " Student Sheet"?></h2>
    <h3><?php echo " Event Date : "; echo $date;?></h3>
    <h4><?php echo " Event Time : "; echo $time;?></h4>
    <h4><?php if($school){
            echo " School Name : "; echo $school;
        } ?></h4>
    <p><?php echo $description;?></p>

    <div style="overflow-x:auto;">
        <table>
            <thead>
            <tr>
                <th>Title</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Mobile Number</th>
                <th>Email</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($student_list as $n) : ?>
            <tr>
                <td><?= $n->title; ?></td>
                <td><?= $n->fname; ?></td>
                <td><?= $n->lname; ?></td>
                <td><?= $n->mobile; ?></td>
                <td><?= $n->email; ?></td>


                </td>
            </tr>
            </tbody>
            <?php endforeach ?>
        </table>
    </div>

    </div>


</body>
</html>

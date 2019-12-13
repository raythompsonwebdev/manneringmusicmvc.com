<section id="main_text" class="group" role="main">

<h1>User List</h1>

<table>
    <thead>
        <th>Name</th>
        <th>Email</th>
        <th>Edit</th>
    </thead>

    <tbody>
        <?php foreach ($authors as $author) : ?>
        <tr>
            <td><?=$author->username;?></td>        
            <td><?=$author->email;?></td>
            <td><a href="/permissions?id=<?=$author->id;?>">Edit Permissions</a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>


</section>
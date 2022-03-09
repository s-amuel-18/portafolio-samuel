<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>id</th>
            <th>nombre</th>
            <th>email</th>
            <th>url_trabajo</th>
            <th>descripcion</th>
            <th>enviado</th>
            <th>created_at</th>
        </tr>
    </thead>
    <tbody>

        <?php foreach ($data as $item) : ?>
            <tr>
                <td><?php echo $item->id?></td>
                <td><?php echo $item->nombre?></td>
                <td><?php echo $item->email?></td>
                <td><?php echo $item->url_trabajo?></td>
                <td><?php echo $item->descripcion?></td>
                <td><?php echo $item->enviado?></td>
                <td><?php echo $item->created_at?></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>
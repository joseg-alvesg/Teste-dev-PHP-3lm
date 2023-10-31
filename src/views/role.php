<div class="table-container">
  <div class="save">
    <h1>Lista de Cargos</h1>
  </div>
  <table>
    <tr>
      <th>ID</th>
      <th>Descrição</th>
      <th>Editar/Remover</th>
    </tr>
    <?php foreach ($roles as $role) : ?>
    <tr class="table-desc">
      <form method="POST" action="/roles">
        <td><?= $role['id'] ?></td>
        <td><input type="text" name="description" value="<?= $role['description'] ?>"></td>
        <input type="hidden" name="id" value="<?= $role['id'] ?>">
        <td class="btns">
          <button type="submit" name="btn" value="edit-role" class="edit-btn">Editar</button>
          <button type="submit" name="btn" value="delete-role" class="delete-btn">Remover</button>
        </td>
      </form>
    </tr>
    <?php endforeach; ?>
  </table>
</div>

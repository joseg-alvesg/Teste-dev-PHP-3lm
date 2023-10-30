<div class='table-container'>
  <h1>Lista de Funcionários</h1>
  <table>
    <tr>
      <th>ID</th>
      <th>Nome</th>
      <th>Sobrenome</th>
      <th>Data de Nascimento</th>
      <th>Cargo</th>
      <th>Salário</th>
      <th>Editar/Remover</th>
    </tr>
    <?php foreach ($employees as $employee) : ?>
      <tr class='table-desc'>
        <form class="" method='post' action='/'>
          <td>
            <input type='hidden' name='id' value='<?= $employee["id"] ?>'>
            <?= $employee['id'] ?>
            </td>
            <td>
              <input type="text" name="firstName" value="<?= $employee['firstName'] ?>">
            </td>
            <td>
              <input type="text" name="lastName" value="<?= $employee['lastName'] ?>">
            </td>
            <td>
              <input type="date" name="birthDate" value="<?= $employee['birthDate'] ?>">
              <td>
                <select name='role' id='role'>
                  <?php foreach ($roles as $role) { ?>
                    <option value="<?php echo $role['id']; ?>" 
                      <?php if ($role['id'] == $employee['role']) {
                          echo 'selected';
                      } ?>>
                        <?php echo $role['description']; ?>
                        </option>
                        <?php } ?>
                        </select>
                      </td>
                      <td>
                        <input type="number" name="salary" value="<?= $employee['salary'] ?>">
                      </td>
                      <td class='btns'>
                        <button
            type="submit"
            class="edit-btn"
            name="btn"
            value="edit"
          >
                          Editar
                        </button>
                        <button 
            type="submit"
            class="delete-btn"
            name="btn"
            value="delete"
          >
                          Remover
                        </button>
                      </td>
                    </form>
                  </tr>
                  <?php endforeach; ?>
                  </table>
                </div>

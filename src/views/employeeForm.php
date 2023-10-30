<form class="employee-form" method='post' action='/'>
  <label for="firstName">
    Nome:
    <input type="text" name="firstName" id="firstName" placeholder="José">
  </label>
  <label for="lastName">
    Sobrenome:
    <input type="text" name="lastName" id="lastName" placeholder="Alves">
  </label>
  <label for="birthDate">
    Data de nascimento:
    <input type="date" name="birthDate" id="birthDate">
  </label>
  <label for="role">
    Cargo
    <select name='role' id='role'>
      <?php foreach ($roles as $role) { ?>
        <option value="<?php echo $role['id']; ?>">
          <?php echo $role['description']; ?>
          </option>
          <?php } ?>
          </select>
        </label>
        <label for="salary">
          Salário:
          <input type="number" name="salary" id="salary" placeholder="1000.00">
        </label>
        <button type="submit" name='btn' value='insert'>
          Cadastrar
        </button>
      </form>

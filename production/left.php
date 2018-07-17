<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
  <div class="menu_section">
    <h3>General</h3>
    <form name="formMenu" id="formMenu" method="post" action="#">
      <input type="hidden" id="txtProyecto" name="txtProyecto" value="">
    </form>
    <ul class="nav side-menu">
      <li><a><i class="fa fa-edit"></i> Mantenedores <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="user_list.php">Usuarios</a></li>
          <li><a href="client_list.php">Clientes</a></li>
          <li><a href="project_list.php">Proyectos</a></li>
        </ul>
      </li>
      <li><a><i class="fa fa-desktop"></i> proyecto uno<span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a onclick="viewProject('project_detail.php',1);" href="#">Detalle</a></li>
          <li><a onclick="viewProject('project_expenses.php',1);" href="#">Gastos</a></li>
        </ul>
      </li>
    </ul>
  </div>
</div>
<script>
function viewProject(link, project){
  formMenu.txtProyecto.value = project;
  formMenu.action = link;
  formMenu.submit();
}
</script>
<!-- /sidebar menu -->

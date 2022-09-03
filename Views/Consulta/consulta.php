<?php headerAdmin($data); 
      getModal('Pacientes', 'formModal', $data);
?>
    <main class="app-content">
      <div class="app-title">
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="<?= ROOT; ?>/dashboard"><?= $data['page_title'] ?></a></li>
        </ul>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="row">
              <div id="cosultFormIn" class="col-lg-12">
                <form id="consultForm">
                  <div class="form-group">
                    <div class="tile-title-w-btn tile-title">
                    <h2>Ingresar datos de la consulta &nbsp&nbsp&nbsp<i class="fa-solid fa-clipboard-list"></i></h2>
                    <button id="newPacBtn" class="btn btn-primary icon-btn"><i class="fa-solid fa-list"></i>  Agregar usuario	</button>
                    </div>
                    <div id="sel__pac" class="form-group">
                      <label for="pac_select" class="formulario__label">Elegir paciente</label>
                      <select name="paciente" class="formulario__input" id="pac_select">

                      </select>
                    </div>

                    <div class="form-group">
                      <label for="pac_select" class="formulario__label">Elegir medico de la consulta</label>
                      <select name="medico" class="formulario__input" id="med_select">

                      </select>
                    </div>

                  <div class="row">

                    <div class="form-group col-md-6">
                      <label for="temp">Temperatura</label>
                      <div class="form-group">
                      <label class="sr-only formulario__label" for="exampleInputAmount">Amount (in ºc)</label>
                      <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text">ºC</span></div>
                        <input  name="temperatura" class="form-control" id="temp" type="number"  list="tickmarks">
                      </div>
                    </div>
                  </div>
                  
                  <div class="form-group col-md-6">
                  <label for="peso">Peso</label>
                    <div class="form-group">
                      <label class="sr-only formulario__label" for="exampleInputAmount">Amount (in kg)</label>
                      <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text">Kg</span></div>
                        <input name="peso" class="form-control" id="peso" type="number" list="tickmarks">
                      </div>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                      <label for="pcr" class="formulario__label">Resultado de la prueba PCR</label>
                      <select name="pcr" class="formulario__input" id="pcr">
                        <option value="positivo">POSITIVO</option>
                        <option value="negativo">NEGATIVO</option>
                      </select>
                    </div>

                <div class="form-group">
                  <label for="sintomas" class="formulario__label">Síntomas presentados</label>
                  <textarea name="sintomas" class="form-control" id="sintomas" rows="2"></textarea>
                </div>
                
                <div class="form-group">
                  <label for="diagnostico" class="formulario__label">Diagnóstico</label>
                  <textarea name="diagnostico" class="form-control" id="diagnostico" rows="2"></textarea>
                </div> 
                
                <div class="form-group">
                  <label for="tratamiento" class="formulario__label">Tratamiento</label>
                  <textarea name="tratamiento" class="form-control" id="tratamiento" rows="2"></textarea>
                </div> 

                
                </div>
                  
                  <!-- <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <input class="form-control-file" id="exampleInputFile" type="file" aria-describedby="fileHelp"><small class="form-text text-muted" id="fileHelp">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
                  </div>
                  <fieldset class="form-group">
                    <legend>Radio buttons</legend>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="form-check-input" id="optionsRadios1" type="radio" name="optionsRadios" value="option1" checked="">Option one is this and that—be sure to include why it's great
                      </label>
                    </div>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="form-check-input" id="optionsRadios2" type="radio" name="optionsRadios" value="option2">Option two can be something else and selecting it will deselect option one
                      </label>
                    </div>
                    <div class="form-check disabled">
                      <label class="form-check-label">
                        <input class="form-check-input" id="optionsRadios3" type="radio" name="optionsRadios" value="option3" disabled="">Option three is disabled
                      </label>
                    </div>
                  </fieldset>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" type="checkbox">Check me out
                    </label>
                  </div> -->
                </form>
              </div>
              <div class="npac-form toggle col-lg-6 offset-lg-1">
                <div class="tile-title-w-btn tile-title">
                    <h2>Registrar Paciente Nuevo &nbsp&nbsp&nbsp<i class="fa-solid fa-user-plus"></i></h2> 
                   <button id="formClose" class="btn btn-danger icon-btn">X</button>
                </div>
                <form action="" class="formulario" id="formNewPaciente" method="POST">
              
                  
                  <!-- Grupo: cedula -->
          
              <div class="form-group col-md-14">
                     <label for="cedula" class="formulario__label">Cédula</label>
                      <div class="form-group">
                      <label class="sr-only formulario__label" for="cedula">Amount (in ºc)</label>
                      <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text">V-</span></div>
                        <input class="form-control" type="text" name="cedula" id="cedula" placeholder="11111111">
                      </div>
                    </div>
                  </div>


              
              <div class="row">
              <!-- Grupo: Apellido -->
              <div class="formulario__grupo col-md-6" id="grupo__apellido">
                <label for="apellido" class="formulario__label">Apellido</label>
                <div class="formulario__grupo-input">
                  <input type="text" class="formulario__input" name="apellido" id="apellido" placeholder="Doe" required>
                  <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
              </div>
              
              <!-- Grupo: Nombre -->
              <div class="formulario__grupo col-md-6" id="grupo__nombre">
                <label for="nombre" class="formulario__label">Nombre</label>
                <div class="formulario__grupo-input">
                  <input type="text" class="formulario__input" name="nombre" id="nombre" placeholder="John">
                  <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
              </div>
            </div>
              <!-- Grupo: sexo -->
              <div class="formulario__grupo" id="grupo__sexo">
                <label for="sexo" class="formulario__label">Sexo</label>
                <select class="formulario__input form-control" id="sexo" name="sexo" required="">
                    <option value="m">Masculino</option>
                    <option value="f">Femenino</option>
                </select>
              </div>

              <div class="direction_container">

                <div class="formulario__grupo" id="grupo__estado">
                  <label for="estado">Estado:</label>
                    <select onchange="changeEDO();" class="form-control select" name="estado" id="sel_estado" style="width: 100%;">
                      
                    </select>
                </div>

                <div class="formulario__grupo" id="grupo__municipio">
                  <label for="municipio">Municipio</label>
                    <select class="form-control select" name="municipio" id="sel_municipio" style="width: 100%;">
                      
                    </select>
                </div>
              </div>
                   <!-- Grupo: Direccion -->
              <div class="formulario__grupo" id="grupo__direccion">
                <label for="direccion" class="formulario__label">Direccion</label>
                <div class="formulario__grupo-input">
                  <input type="textarea" title="Breve descripcion" class="formulario__input" name="direccion" id="direccion" placeholder="Avienida principal">
                  <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
              </div>

              <!-- Grupo: fecha de nacimiento -->
              <div class="formulario__grupo" id="grupo__fechaNacimiento">
                <label for="fechaNacimiento" class="formulario__label">Fecha de nacimiento</label>
                <div class="formulario__grupo-input">
                  <input type="date" class="formulario__input" name="fechaNacimiento" id="fechaNacimiento">
                  <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
              </div>

              <!-- Grupo: numero telefonico -->
              <div class="formulario__grupo" id="grupo__telefono">
                <label for="telefono" class="formulario__label">Número telefónico</label>
                <div class="formulario__grupo-input">
                  <input type="text" class="formulario__input" name="telefono" id="telefono" placeholder="">
                  <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
              </div>
            </form>
              </div>
            </div>
            <div class="tile-footer d-flex justify-content-around">
              <button  id="consulta__submit" onclick="saveC()" class="btn btn-primary col-md-7 btn-c" type="submit">Enviar datos de Consulta</button>
            </div>
          </div>
        </div>
      </div>

    </main>
    

    <?php footerAdmin($data); ?>
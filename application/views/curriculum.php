<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<style>
  @page {
    margin: 0px;
    padding: 0;
  }

  p {
    font-size: 15px !important;
  }

  *,
  h1 {
    font-family: sans-serif;
    word-wrap: break-word;
  }

  .h1_sg {
    font-size: 40px;
  }

  .h4_sg {
    font-size: 25px;
    margin-bottom: 15px;
  }

  .h5_sg {
    font-size: 20px;
    /* color: #000; */
  }

  /* tr, td {
    border: none !important;
  } */
</style>

<body>

  <div>
    <table class="table table-light bg-white text-muted" style="height: 1100px;">
      <tbody >
        <tr >
          <td class="p-0 bg-primary" style="width: 35%; border: none">
            <img class="rounded-circle w-100" src="<?php echo base_url($img_perfil)?>" alt="">

            <!-- </div> -->
          </td>
          <td style="width: 65%;" class="p-4">
        
            <div class="h1_sg">
              <?php echo $nombre_completo?>
            </div>
            <p>
            <?php echo $resumen ?>
            </p>
          </td>
        </tr>

        <tr>
          <td style="width: 35%; border: none" class="bg-primary text-white p-4">
            <div class="w-100">
              <div class="h4_sg mb-2">Contacto</div>
              <ul class="pl-2" style="list-style-type: none;">

                <li class="mb-2">Correo Electronico:
                  <div class="pl-2">
                    <?php echo $info_personal->email?>
                  </div>
                </li>
                <li class="mb-2">telefono:
                  <div class="pl-2">
                    <a href="https://wa.me/<?php echo trim(str_replace(" ", "", $info_personal->telefono), "+")?>">
                      WhatsApp: <?php echo $info_personal->telefono?>
                    </a>
                  </div>
                </li>
              </ul>

            </div>

            <div class="w-100">

              <div class="h4_sg mb-2">Habilidades</div>

              <?php foreach($habilidades as $habilidad):?>
                <div class="mb-3">
                  <table class="w-100">
                    <tbody>
                      <tr class="p-0">
                        <td class="p-0" style="border: none;"><small class="mb-2 d-block"><?php echo $habilidad->nombre?></small></td>
                        <td class="p-0" style="border: none;">
                          <div class="text-right">
                            <small class="mb-2 d-block">
                            <?php echo $habilidad->nivel?>%
                            </small>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  
                  <!-- <div >dsads</div> -->
                  <div class="w-100">
                    <div class="bg-light p-1" style="width: <?php echo $habilidad->nivel?>%;">
                      <div style="font-size: 1px;">1</div>
                    </div>
                  </div>
                </div>
              <?php endforeach?>
            
            </div>

            <div class="w-100 mt-1">
              <div class="h4_sg mb-2">Referencias</div>

                <div class="">
                  <p class="">
                    Armando Graterol <br> CEO Avimark
                  </p>

                  <p class="">
                  +58 424 195 14 31
                  </p>
                </div>
  
          

            </div>
            
          </td>
          <td style="width: 65%;" class="p-4">
            <div class="h4_sg">Experiencia</div>

            <?php foreach($resumenes_laborales as $res):?>
            <div class="mb-3">
              <div>
                <div class="icon_box_content text_white">
                  <div class="mb-2"><?php echo $res->nombre?> <span style="font-size: 12px;!important "> |  <?php echo $res->duracion?></span></div>
                  <p>
                    <!-- <small> -->
                      <?php echo $res->descripcion?>

                    <!-- </small> -->
                  </p>
                </div>
              </div>
            </div>
            <?php endforeach?>
          </td>
        </tr>
      </tbody>
    </table>

  </div>

</body>

</html>
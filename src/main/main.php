<div class="container-fluid main">
  <div class="row">
    <div class="col-2" id="item">
      <div id="sup1" class="item_content img-fluid">
        <img src="./ressources/insert/srequiem-removebg.png" onclick="active_sup('sup1')" class="img-fluid "
          alt="Responsive image">
      </div>
      <div id="sup2" class="item_content img-fluid">
        <img src="./ressources/insert/groussel-removebg.png" onclick="active_sup('sup2')" class="img-fluid "
          alt="Responsive image">
      </div>
      <div id="sup3" class="item_content img-fluid">
        <img src="./ressources/insert/kesaint--removebg.png" onclick="active_sup('sup3')" class="img-fluid "
          alt="Responsive image">
      </div>
      <div id="sup4" class="item_content img-fluid">
        <img src="./ressources/insert/aljigmon-removebg.png" onclick="active_sup('sup4')" class="img-fluid "
          alt="Responsive image">
      </div>
      <div id="sup5" class="item_content img-fluid">
        <img src="./ressources/insert/afrangio-removebg.png" onclick="active_sup('sup5')" class="img-fluid "
          alt="Responsive image">
      </div>
      <div id="sup6" class="item_content img-fluid">
        <img src="./ressources/insert/msteffen-removebg.png" onclick="active_sup('sup6')" class="img-fluid "
          alt="Responsive image">
      </div>
      <div id="sup7" class="item_content img-fluid">
        <img src="./ressources/insert/cpayen-removebg.png" onclick="active_sup('sup7')" class="img-fluid "
          alt="Responsive image">
      </div>
      <div id="sup8" class="item_content img-fluid">
        <img src="./ressources/insert/maroland-removebg.png" onclick="active_sup('sup8')" class="img-fluid "
          alt="Responsive image">
      </div>
      <div id="sup9" class="item_content img-fluid">
        <img src="./ressources/insert/vlaroque-removebg.png" onclick="active_sup('sup9')" class="img-fluid "
          alt="Responsive image">
      </div>
      <div id="sup10" class="item_content img-fluid">
        <img src="./ressources/insert/oespion-removebg.png" onclick="active_sup('sup10')" class="img-fluid "
          alt="Responsive image">
      </div>

    </div>
    <div class="col-6" id="montage_view">
      <?php
			if (array_key_exists('error', $_GET)) {
					echo '<div id="error_div">' . $_GET['error'] . '</div>';
				} else if (array_key_exists('success', $_GET)) {
					echo '<div id="success_div">' . $_GET['success'] . '</div>';
				}
			?>
      <div id="choice">
        <div class="custom-control custom-radio custom-control-inline">
          <input type="radio" id="customRadioInline1" name="customRadioInline1" class="custom-control-input"
            onclick="choice('image')">
          <label class="custom-control-label" for="customRadioInline1">Image</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
          <input type="radio" id="customRadioInline2" name="customRadioInline1" class="custom-control-input"
            onclick="choice('webcam')" checked="checked">
          <label class="custom-control-label" for="customRadioInline2">Webcam</label>
        </div>
      </div>
      <div class="d-flex flex-column justify-content-center" id="webcam">
        <div id="image_c" style="display:none;">
        </div>
        <video autoplay id="video" style="display:block;"></video>
        <input type="file" name="file_back" id="file_back" style="display:none">
        <button class="btn my-2 my-sm-0 signin disabled" id="capture" onclick="capture_image()">Capture</button>
      </div>
    </div>
    <div class="col-4 d-flex flex-column" id="output">
      <form action="./src/main/montage.php" method="post">
        <div class="form-group">
          <input type="hidden" id="list_image" name="list_image" value="">
          <input type="hidden" id="position_image" name="position_image" value="">
          <button type="submit" class="btn btn-primary btn_send" name="image_sub" id="send_montage">Submit</button>
      </form>
      <div id="outputc"></div>
    </div>
  </div>
</div>
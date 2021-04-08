<form id="prepare-div" class="form-group mx-5 my-3">
    <div class="form-check mx-3 my-2">
        <input class="form-check-input" type="checkbox" id="y1_check" name="y1_check" value="y1_check" checked>
        <label class="form-check-label" for="y1_check">data Y1</label>
    </div>
    <div class="form-check mx-3 my-2">
        <input class="form-check-input" type="checkbox"  id="y2_check" name="y2_check" value="y2_check" checked>
        <label class="form-check-label" for="y2_check">data Y2</label>
    </div>
    <div class="form-check mx-3 my-2">
        <input class="form-check-input" type="checkbox"  id="y3_check" name="y3_check" value="y3_check" checked>
        <label class="form-check-label" for="y3_check">data Y3 </label>
    </div>

    <div class="mb-2 col-2">
        <label for="a_param" class="sr-only">Parameter</label>
        <input type="number" class="form-control" id="a_param" name="a_param" placeholder="hodnota parametra" value="1">
    </div>
    <hr>
    <div class="mb-2 col-2">
        <label for="client_id" class="sr-only">ID klienta</label>
        <input type="text" class="form-control" id="client_id" name="client_id" placeholder="ID" value="xkopalr1">
    </div>
    <button type="button" id="prepareButton" onclick="prepareParams()" class="btn btn-primary mb-2 mx-3 my-3">Spusti</button>
</form>
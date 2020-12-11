<div class="col-12 p-3" style="border-top:1px #fbfafafa solid; background:#ffffff69;">
    <div class="text-dark container">
        <div class="d-md-flex">
            <div class="col-md-7 mr-auto">
                <span class="save">Last Edit Was at <?= $data->updated_at; ?></span>
            </div>
            <div class="col-md-5 ml-auto text-right">
                <div class="d-flex mt-sm-4 mt-md-0 ml-md-5">

                    <div class="pr-3">
                        <h5 class="text-dark">Allowing Responses</h5>
                    </div>
                    <div>
                        <?php if ($data->allowing_responses == 0) : ?>
                            <label class="switch ml-auto pt-2">
                                <input type="checkbox" id="switch">
                                <div class="slider round"></div>
                            </label>
                        <?php elseif ($data->allowing_responses == 1) : ?>
                            <label class="switch ml-auto pt-2">
                                <input type="checkbox" checked id="switch">
                                <div class="slider round"></div>
                            </label>
                        <?php else : ?>
                            <label class="switch ml-auto pt-2">
                                <input type="checkbox" id="switch">
                                <div class="slider round"></div>
                            </label>
                        <?php endif; ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
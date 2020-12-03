<div class="col-12 p-3" style="border-top:1px #fbfafafa solid; background:#ffffff69;">
    <div class="text-dark container">
        <div class="d-flex">
            <div class="col mr-auto">
                <span class="save">Last Edit Was at <?= $data->updated_at; ?></span>
            </div>
            <div class="col ml-auto text-left">
                <div class="d-flex">

                    <div class="pr-3">
                        <h5 class="text-dark">Allowing Responses</h5>
                    </div>
                    <div>
                        <?php if ($data->allowing_responses == 'no') : ?>
                            <label class="switch ml-auto pt-2">
                                <input type="checkbox">
                                <div class="slider round"></div>
                            </label>
                        <?php else : ?>
                            <label class="switch ml-auto pt-2">
                                <input type="checkbox" checked>
                                <div class="slider round"></div>
                            </label>
                        <?php endif; ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
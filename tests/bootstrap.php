<?php
if (is_dir(__DIR__ . '/../Numbers')) {
    set_include_path(
        __DIR__ . '/../' . PATH_SEPARATOR . get_include_path()
    );
}

?>

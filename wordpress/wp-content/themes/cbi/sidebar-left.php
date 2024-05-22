<?php

if (!is_active_sidebar('left-sidebar')) {
    return;
}
dynamic_sidebar('left-sidebar');
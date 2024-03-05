<form name="get_item" method="get" action="search">
    <input type="text" name="q" placeholder="Enter an id or title">
    <button type="submit">Search</button>
</form>

<?php

var_dump($data); ?>

<template id="item">
    <article>
        <h2 class="header"></h2>
        <p class="text"></p>
    </article>
</template>
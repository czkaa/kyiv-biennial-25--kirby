<nav class="language-toggle flex space-x-1">
  <ul class="w-fit m-0">
    <?php foreach ($kirby->languages() as $language): ?>
      <li >
        <a class="inline-block bg-black p-3 text-white text-md pointer-events-auto <?= $kirby->language()->code() === $language->code() ? ' hidden' : '' ?>" href="<?= $page->url($language->code()) ?>">
          <?= html($language->code()) ?>
        </a>
      </li>
    <?php endforeach ?>
  </ul>
</nav>
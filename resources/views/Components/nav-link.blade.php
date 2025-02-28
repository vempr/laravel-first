@props(["active" => false])

<a
  class="{{ $active ? 'underline': 'no-underline'}} text-sky-600"
  aria-current="{{ $active ? 'page': 'false' }}"
  {{ $attributes }}>{{ $slot }}</a>
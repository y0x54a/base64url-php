<?php return [
  'validInputs' => [
    ['', '', ''],
    ['f', 'Zg==', 'Zg'],
    ['fo', 'Zm8=', 'Zm8'],
    ['foo', 'Zm9v', 'Zm9v'],
    ['foob', 'Zm9vYg==', 'Zm9vYg'],
    ['fooba', 'Zm9vYmE=', 'Zm9vYmE'],
    ['foobar', 'Zm9vYmFy', 'Zm9vYmFy'],
    ["\u{0000}", 'AA==', 'AA'],
    ["\u{000f}", 'Dw==', 'Dw'],
    ["\u{00ff}", 'w78=', 'w78'],
    ["\u{0fff}", '4L+/', '4L-_'],
    ["\u{ffff}", '77+/', '77-_']
  ],

  'invalidInputs' => [
    'f',
    'fooba',
    'Zg===',
    '4L+/',
    '77+/'
  ]
];
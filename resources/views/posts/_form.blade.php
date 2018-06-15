    @include('forms._input',[
    'name'=>'name',
    'class'=>'',
    'required'=>true,
    'text'=>'Обязательное поле',
    'label'=>'Название',
    ])
    @include('forms._textarea',[
    'name'=>'content',
    'class'=>'',
    'label'=>'Контент статьи',
    ])
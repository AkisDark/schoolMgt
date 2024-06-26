<?php

return [

  /*
  |--------------------------------------------------------------------------
  | Validation Language Lines
  |--------------------------------------------------------------------------
  |
  | The following language lines contain the default error messages used by
  | the validator class. Some of these rules have multiple versions such
  | such as the size rules. Feel free to tweak each of these messages.
  |
  */

  'accepted'       => 'يجب قبول الحقل ',
  'active_url'      => 'الحقل لا يُمثّل رابطًا صحيحًا',
  'after'        => 'يجب على الحقل أن يكون تاريخًا لاحقًا للتاريخ :date.',
  'after_or_equal'    => 'الحقل يجب أن يكون تاريخاً لاحقاً أو مطابقاً للتاريخ :date.',
  'alpha'        => 'يجب أن لا يحتوي الحقل سوى على حروف',
  'alpha_dash'      => 'يجب أن لا يحتوي الحقل على حروف، أرقام ومطّات.',
  'alpha_num'      => 'يجب أن يحتوي على حروفٍ وأرقامٍ فقط',
  'array'        => 'يجب أن يكون الحقل ًمصفوفة',
  'before'        => 'يجب على الحقل أن يكون تاريخًا سابقًا للتاريخ :date.',
  'before_or_equal'   => 'الحقل يجب أن يكون تاريخا سابقا أو مطابقا للتاريخ :date',
  'between'       => [
    'numeric' => 'يجب أن تكون قيمة بين :min و :max.',
    'file'  => 'يجب أن يكون حجم الملف بين :min و :max كيلوبايت.',
    'string' => 'يجب أن يكون عدد حروف النّص بين :min و :max',
    'array'  => 'يجب أن يحتوي على عدد من العناصر بين :min و :max',
  ],
  'boolean'       => 'يجب أن تكون قيمة الحقل إما true أو false ',
  'confirmed'      => 'حقل التأكيد غير مُطابق للحقل ',
  'date'         => 'الحقل ليس تاريخًا صحيحًا',
  'date_format'     => 'لا يتوافق الحقل مع الشكل :format.',
  'different'      => 'يجب أن يكون الحقلان و :other مُختلفان',
  'digits'        => 'يجب أن يحتوي الحقل على :digits رقمًا/أرقام',
  'digits_between'    => 'يجب أن يحتوي الحقل بين :min و :max رقمًا/أرقام ',
  'dimensions'      => 'الـ يحتوي على أبعاد صورة غير صالحة.',
  'distinct'       => 'للحقل قيمة مُكرّرة.',
  'email'        => 'يجب أن يكون عنوان بريد إلكتروني صحيح البُنية',
  'exists'        => 'الحقل لاغٍ',
  'file'         => 'الـ يجب أن يكون من ملفا.',
  'filled'        => 'الحقل إجباري',
  'image'        => 'يجب أن يكون الحقل صورةً',
  'in'          => 'الحقل لاغٍ',
  'in_array'       => 'الحقل غير موجود في :other.',
  'integer'       => 'يجب أن يكون الحقل عددًا صحيحًا',
  'ip'          => 'يجب أن يكون الحقل عنوان IP ذا بُنية صحيحة',
  'ipv4'         => 'يجب أن يكون الحقل عنوان IPv4 ذا بنية صحيحة.',
  'ipv6'         => 'يجب أن يكون الحقل عنوان IPv6 ذا بنية صحيحة.',
  'json'         => 'يجب أن يكون الحقل نصا من نوع JSON.',
  'max'         => [
    'numeric' => 'يجب أن تكون قيمة الحقل مساوية أو أصغر لـ :max.',
    'file'  => 'يجب أن لا يتجاوز حجم الملف :max كيلوبايت',
    'string' => 'يجب أن لا يتجاوز طول نص :max حروفٍ/حرفًا',
    'array'  => 'يجب أن لا يحتوي الحقل على أكثر من :max عناصر/عنصر.',
  ],
  'mimes'        => 'يجب أن يكون الحقل ملفًا من نوع : :values.',
  'mimetypes'      => 'يجب أن يكون الحقل ملفًا من نوع : :values.',
  'min'         => [
    'numeric' => 'يجب أن تكون قيمة الحقل مساوية أو أكبر لـ :min.',
    'file'  => 'يجب أن يكون حجم الملف على الأقل :min كيلوبايت',
    'string' => 'يجب أن يكون طول نص على الأقل :min حروفٍ/حرفًا',
    'array'  => 'يجب أن يحتوي الحقل على الأقل على :min عُنصرًا/عناصر',
  ],
  'not_in'        => 'الحقل لاغٍ',
  'numeric'       => 'يجب على الحقل أن يكون رقمًا',
  'present'       => 'يجب تقديم الحقل ',
  'regex'        => 'صيغة الحقل .غير صحيحة',
  'required'       => 'الحقل مطلوب.',
  'required_if'     => 'الحقل مطلوب في حال ما إذا كان :other يساوي :value.',
  'required_unless'   => 'الحقل مطلوب في حال ما لم يكن :other يساوي :values.',
  'required_with'    => 'الحقل إذا توفّر :values.',
  'required_with_all'  => 'الحقل إذا توفّر :values.',
  'required_without'   => 'الحقل إذا لم يتوفّر :values.',
  'required_without_all' => 'الحقل إذا لم يتوفّر :values.',
  'same'         => 'يجب أن يتطابق الحقل مع :other',
  'size'         => [
    'numeric' => 'يجب أن تكون قيمة الحقل مساوية لـ :size',
    'file'  => 'يجب أن يكون حجم الملف :size كيلوبايت',
    'string' => 'يجب أن يحتوي النص على :size حروفٍ/حرفًا بالظبط',
    'array'  => 'يجب أن يحتوي الحقل على :size عنصرٍ/عناصر بالظبط',
  ],
  'string'        => 'يجب أن يكون الحقل نصآ.',
  'timezone'       => 'يجب أن يكون نطاقًا زمنيًا صحيحًا',
  'unique'        => 'قيمة الحقل مُستخدمة من قبل',
  'uploaded'       => 'فشل في تحميل الـ ',
  'url'         => 'صيغة الرابط غير صحيحة',

  /*
  |--------------------------------------------------------------------------
  | Custom Validation Language Lines
  |--------------------------------------------------------------------------
  |
  | Here you may specify custom validation messages for attributes using the
  | convention "attribute.rule" to name the lines. This makes it quick to
  | specify a specific custom language line for a given attribute rule.
  |
  */

  'custom' => [
    'attribute-name' => [
      'rule-name' => 'custom-message',
    ],
  ],

  /*
  |--------------------------------------------------------------------------
  | Custom Validation Attributes
  |--------------------------------------------------------------------------
  |
  | The following language lines are used to swap attribute place-holders
  | with something more reader friendly such as E-Mail Address instead
  | of "email". This simply helps us make messages a little cleaner.
  |
  */

  'attributes' => [
    'name'         => 'الاسم',
    'username'       => 'اسم المُستخدم',
    'email'         => 'البريد الالكتروني',
    'first_name'      => 'الاسم',
    'last_name'       => 'اسم العائلة',
    'password'       => 'كلمة المرور',
    'password_confirmation' => 'تأكيد كلمة المرور',
    'city'         => 'المدينة',
    'country'        => 'الدولة',
    'address'        => 'العنوان',
    'phone'         => 'الهاتف',
    'mobile'        => 'الجوال',
    'age'          => 'العمر',
    'sex'          => 'الجنس',
    'gender'        => 'النوع',
    'day'          => 'اليوم',
    'month'         => 'الشهر',
    'year'         => 'السنة',
    'hour'         => 'ساعة',
    'minute'        => 'دقيقة',
    'second'        => 'ثانية',
    'content'        => 'المُحتوى',
    'description'      => 'الوصف',
    'excerpt'        => 'المُلخص',
    'date'         => 'التاريخ',
    'time'         => 'الوقت',
    'available'       => 'مُتاح',
    'size'         => 'الحجم',
    'price'         => 'السعر',
    'desc'         => 'نبذه',
    'title'         => 'العنوان',
    'q'           => 'البحث',
    'link'         => ' ',
    'slug'         => ' ',
  ],

];
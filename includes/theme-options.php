<?php
/**
 * Initialize the custom theme options.
 */
add_action( 'admin_init', 'custom_theme_options' );

/**
 * Build the custom settings & update OptionTree.
 */
function custom_theme_options() {
  
  /* OptionTree is not loaded yet */
  if ( ! function_exists( 'ot_settings_id' ) )
    return false;
    
  /**
   * Get a copy of the saved settings array. 
   */
  $saved_settings = get_option( ot_settings_id(), array() );
  
  /**
   * Custom settings array that will eventually be 
   * passes to the OptionTree Settings API Class.
   */
  $custom_settings = array( 
    'contextual_help' => array( 
      'sidebar'       => ''
    ),
    'sections'        => array( 
      array(
        'id'          => 'general',
        'title'       => __( 'الاعدادات العامة', 'marvPress' )
      ),
      array(
        'id'          => 'themeop',
        'title'       => __( 'خيارات المظهر', 'marvPress' )
      ),
      array(
        'id'          => 'banerop',
        'title'       => __( 'البنرات واعدادها', 'marvPress' )
      ),
      array(
        'id'          => '____________________________________',
        'title'       => __( 'اعدادات الاتصال بنا', 'marvPress' )
      ),
      array(
        'id'          => 'massge_option',
        'title'       => __( 'اعدادات الرسائل', 'marvPress' )
      )
    ),
    'settings'        => array( 
      array(
        'id'          => 'logo_marvpress',
        'label'       => __( 'الشعار', 'marvPress' ),
        'desc'        => __( 'الشعار الرسمي الخاص بالموقع، يظهر في أعلى الموقع لجميع الصفحات.', 'marvPress' ),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => 'attachment',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'favicon',
        'label'       => __( 'الايقونة المفضلة', 'marvPress' ),
        'desc'        => __( 'هذه الايقونة تظهر في المتصفح بجانب اسم الموقع', 'marvPress' ),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'home_page',
        'label'       => __( 'الصفحة الرئيسية', 'marvPress' ),
        'desc'        => __( 'هذا الخيار يتيح لك تحديد صفحة الموقع الرئيسية، لكي تستطيع توزيع الصفحة كما تريد.', 'marvPress' ),
        'std'         => '',
        'type'        => 'page-select',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'social_site',
        'label'       => __( 'حسابات مواقع التواصل الاجتماعي', 'marvPress' ),
        'desc'        => __( 'مواقع التواصل الاجتماعي الخاصة بالموقع', 'marvPress' ),
        'std'         => '',
        'type'        => 'social-links',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'or'
      ),
      array(
        'id'          => 'newsop',
        'label'       => __( 'خيارات الأخبار', 'marvPress' ),
        'desc'        => __( 'هذه الخيارت خاصة بالاخبار في جميع أقسام وصفحات الموقع', 'marvPress' ),
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => 'd',
            'label'       => __( 'عرض تاريخ الخبر', 'marvPress' ),
            'src'         => ''
          ),
          array(
            'value'       => 'c',
            'label'       => __( 'عرض عدد تعليقات الخبر', 'marvPress' ),
            'src'         => ''
          ),
          array(
            'value'       => 'w',
            'label'       => __( 'عرض اسم كاتب الخبر', 'marvPress' ),
            'src'         => ''
          ),
          array(
            'value'       => 'v',
            'label'       => __( 'عرض عدد المشاهدات', 'marvPress' ),
            'src'         => ''
          )
        )
      ),
      array(
        'id'          => 'footerop',
        'label'       => __( 'عبارة حقوق الفوتر', 'marvPress' ),
        'desc'        => __( 'هذه العبارة سوف تظهر في أسف الموقع في منطقة الفوتر، يتم كتابة فيها حقوق الموقع للحفاظ على الخصوصية', 'marvPress' ),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'cat_in_search',
        'label'       => __( 'الاقسام التي تظهر في صفحة البحث', 'marvPress' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'category-checkbox',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'mmsi',
        'label'       => __( 'تخطيط الموقع', 'marvPress' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'tab',
        'section'     => 'themeop',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'widthw',
        'label'       => __( 'عرض الموقع', 'marvPress' ),
        'desc'        => __( 'هذا الخيار يتيح لك تحد اذا كنت تريد طريقة عرض الموقع على كامل الشاشة أم على المنتصف', 'marvPress' ),
        'std'         => '',
        'type'        => 'select',
        'section'     => 'themeop',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => 'c',
            'label'       => __( 'في وسط الصفحة', 'marvPress' ),
            'src'         => ''
          ),
          array(
            'value'       => 'w',
            'label'       => __( 'على عرض الصفحة', 'marvPress' ),
            'src'         => ''
          )
        )
      ),
      array(
        'id'          => 'slider_on',
        'label'       => __( 'تفعيل السلايدر', 'marvPress' ),
        'desc'        => __( 'هذا الخيار يتح لك تفعيل عرض السلادير الموجود في الصفحة الرئيسية للموقع.', 'marvPress' ),
        'std'         => '',
        'type'        => 'on-off',
        'section'     => 'themeop',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'index_part',
        'label'       => __( 'توزيع الصفحة الرئيسية للموقع', 'marvPress' ),
        'desc'        => __( 'هذا الخيار يتيح لك اختيار طريقة توزيع صفحة الموقع الرئيسية، بالخيارات المتوفرة.', 'marvPress' ),
        'std'         => 'right-sidebar',
        'type'        => 'radio-image',
        'section'     => 'themeop',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => 'left-content-right',
            'label'       => __( 'شريط جانبي يسار ثم محتوى ثم شريط جانبي يمين', 'marvPress' ),
            'src'         => 'assets/images/marv-img/dual-sidebar.png/'
          ),
          array(
            'value'       => 'content-left-right',
            'label'       => __( 'محتوى ثم شريط جانبي يسار ثم شريط جانبي يمين', 'marvPress' ),
            'src'         => 'assets/images/marv-img/contant-left-right.png/'
          ),
          array(
            'value'       => 'content-only',
            'label'       => __( 'محتوى فقط بدون اي شريط جانبي', 'marvPress' ),
            'src'         => 'assets/images/marv-img/contant-only.png/'
          ),
          array(
            'value'       => 'content-right',
            'label'       => __( 'محتوى ثم شريط جانبي يسار', 'marvPress' ),
            'src'         => 'assets/images/marv-img/contant-right.png/'
          ),
          array(
            'value'       => 'left-content',
            'label'       => __( 'شريط جانبي يسار ثم محتوى', 'marvPress' ),
            'src'         => 'assets/images/marv-img/left-contant.png/'
          ),
          array(
            'value'       => 'left-right-content',
            'label'       => __( 'محتوى ثم شريط جانبي يمين ثم شريط جانبي يسار', 'marvPress' ),
            'src'         => 'assets/images/marv-img/left-right-contant.png/'
          )
        )
      ),
      array(
        'id'          => 'cat_part',
        'label'       => __( 'توزيع صفحة الاقسام', 'marvPress' ),
        'desc'        => __( 'هذا الخيار يتيح لك تحديد طريقة توزيع صفحة الخاصة بالقسم، بالخيارات المتوفرة .', 'marvPress' ),
        'std'         => '',
        'type'        => 'radio-image',
        'section'     => 'themeop',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => 'left-content-right',
            'label'       => __( 'شريط جانبي يسار ثم محتوى ثم شريط جانبي يمين', 'marvPress' ),
            'src'         => 'assets/images/marv-img/left-right-contant.png/'
          ),
          array(
            'value'       => 'content-left-right',
            'label'       => __( 'محتوى ثم شريط جانبي يسار ثم شريط جانبي يمين', 'marvPress' ),
            'src'         => 'assets/images/marv-img/left-right-contant.png/'
          ),
          array(
            'value'       => 'content-only',
            'label'       => __( 'محتوى فقط بدون اي شريط جانبي', 'marvPress' ),
            'src'         => 'assets/images/marv-img/left-right-contant.png/'
          ),
          array(
            'value'       => 'content-right',
            'label'       => __( 'محتوى ثم شريط جانبي يسار', 'marvPress' ),
            'src'         => 'assets/images/marv-img/left-right-contant.png/'
          ),
          array(
            'value'       => 'left-content',
            'label'       => __( 'شريط جانبي يسار ثم محتوى', 'marvPress' ),
            'src'         => 'assets/images/marv-img/left-right-contant.png/'
          ),
          array(
            'value'       => 'left-right-content',
            'label'       => __( 'محتوى ثم شريط جانبي يمين ثم شريط جانبي يسار', 'marvPress' ),
            'src'         => 'assets/images/marv-img/left-right-contant.png/'
          )
        )
      ),
      array(
        'id'          => 'page_part',
        'label'       => __( 'توزيع صفحة الصفحات', 'marvPress' ),
        'desc'        => __( 'هذا الخيار يتيح لك تحديد طريقة توزيع صفحة مشاهدة الصفحات، بالخيارات المتاحة.', 'marvPress' ),
        'std'         => '',
        'type'        => 'radio-image',
        'section'     => 'themeop',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => 'left-content-right',
            'label'       => __( 'شريط جانبي يسار ثم محتوى ثم شريط جانبي يمين', 'marvPress' ),
            'src'         => 'assets/images/marv-img/left-right-contant.png/'
          ),
          array(
            'value'       => 'content-left-right',
            'label'       => __( 'محتوى ثم شريط جانبي يسار ثم شريط جانبي يمين', 'marvPress' ),
            'src'         => 'assets/images/marv-img/left-right-contant.png/'
          ),
          array(
            'value'       => 'content-only',
            'label'       => __( 'محتوى فقط بدون اي شريط جانبي', 'marvPress' ),
            'src'         => 'assets/images/marv-img/left-right-contant.png/'
          ),
          array(
            'value'       => 'content-right',
            'label'       => __( 'محتوى ثم شريط جانبي يسار', 'marvPress' ),
            'src'         => 'assets/images/marv-img/left-right-contant.png/'
          ),
          array(
            'value'       => 'left-content',
            'label'       => __( 'شريط جانبي يسار ثم محتوى', 'marvPress' ),
            'src'         => 'assets/images/marv-img/left-right-contant.png/'
          ),
          array(
            'value'       => 'left-right-content',
            'label'       => __( 'محتوى ثم شريط جانبي يمين ثم شريط جانبي يسار', 'marvPress' ),
            'src'         => 'assets/images/marv-img/left-right-contant.png/'
          )
        )
      ),
      array(
        'id'          => 'post_part',
        'label'       => __( 'توزيع صفحة الاخبار', 'marvPress' ),
        'desc'        => __( 'هذا الخيار يتيح لك تحديد طريقة توزيع صفحة مشاهدة الخبر، بالخيارات المتاحة.', 'marvPress' ),
        'std'         => '',
        'type'        => 'radio-image',
        'section'     => 'themeop',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => 'left-content-right',
            'label'       => __( 'شريط جانبي يسار ثم محتوى ثم شريط جانبي يمين', 'marvPress' ),
            'src'         => 'assets/images/marv-img/left-right-contant.png/'
          ),
          array(
            'value'       => 'content-left-right',
            'label'       => __( 'محتوى ثم شريط جانبي يسار ثم شريط جانبي يمين', 'marvPress' ),
            'src'         => 'assets/images/marv-img/left-right-contant.png/'
          ),
          array(
            'value'       => 'content-only',
            'label'       => __( 'محتوى فقط بدون اي شريط جانبي', 'marvPress' ),
            'src'         => 'assets/images/marv-img/left-right-contant.png/'
          ),
          array(
            'value'       => 'content-right',
            'label'       => __( 'محتوى ثم شريط جانبي يسار', 'marvPress' ),
            'src'         => 'assets/images/marv-img/left-right-contant.png/'
          ),
          array(
            'value'       => 'left-content',
            'label'       => __( 'شريط جانبي يسار ثم محتوى', 'marvPress' ),
            'src'         => 'assets/images/marv-img/left-right-contant.png/'
          ),
          array(
            'value'       => 'left-right-content',
            'label'       => __( 'محتوى ثم شريط جانبي يمين ثم شريط جانبي يسار', 'marvPress' ),
            'src'         => 'assets/images/marv-img/left-right-contant.png/'
          )
        )
      ),
      array(
        'id'          => 'fontmain',
        'label'       => __( 'خط الموقع الرسمي', 'marvPress' ),
        'desc'        => __( 'هذا الخيار يتيح لك تحديد نوع خط الموقع الرئيسي من ضمن باقية الخطوط الموجودة في مارف بريس', 'marvPress' ),
        'std'         => '',
        'type'        => 'select',
        'section'     => 'themeop',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => '___________________',
            'label'       => __( 'الخط الاول', 'marvPress' ),
            'src'         => ''
          ),
          array(
            'value'       => '_____________________',
            'label'       => __( 'الخط الثاني', 'marvPress' ),
            'src'         => ''
          )
        )
      ),
      array(
        'id'          => 'headerop',
        'label'       => __( 'خيارات الهيدر', 'marvPress' ),
        'desc'        => __( 'هذا الخيار يتيح لك تحديد اذا كنت تريد عرض الهيدر مع البنر ومواقع التواصل أم مواقع التواصل بدون البنر أم عرض البنر فقط أم بدون البنر ومواقع التواصل', 'marvPress' ),
        'std'         => '',
        'type'        => 'select',
        'section'     => 'themeop',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => 't',
            'label'       => __( 'عرض الهيدر مع البنر ومواقع التواصل', 'marvPress' ),
            'src'         => ''
          ),
          array(
            'value'       => 'b',
            'label'       => __( 'عرض الهيدر مع البنر فقط', 'marvPress' ),
            'src'         => ''
          ),
          array(
            'value'       => 'c',
            'label'       => __( 'عرض الهيدر مع مواقع التواصل فقط', 'marvPress' ),
            'src'         => ''
          ),
          array(
            'value'       => 'n',
            'label'       => __( 'عرض الهيدر بدون البنر ومواقع التواصل', 'marvPress' ),
            'src'         => ''
          )
        )
      ),
      array(
        'id'          => 'bg_body',
        'label'       => __( 'خلفية الموقع', 'marvPress' ),
        'desc'        => __( 'هذا الخيار يتيح لك اضافة خلفية للموقع اما لون أو صورة مع تحديد طريقة عرض الصورة.', 'marvPress' ),
        'std'         => '',
        'type'        => 'background',
        'section'     => 'themeop',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'colorsite',
        'label'       => __( 'اللوان الموقع', 'marvPress' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'tab',
        'section'     => 'themeop',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'colorm',
        'label'       => __( 'اللون الاساسي للموقع', 'marvPress' ),
        'desc'        => __( 'هذا الخيار يحدد لك لون الخط الرئيسي للموقع بشكل كامل', 'marvPress' ),
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'themeop',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'colora',
        'label'       => __( 'لون الرابط', 'marvPress' ),
        'desc'        => __( 'هذا الخيار يتيح لك تغير لون النص الذي يحتوي على رابط', 'marvPress' ),
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'themeop',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'colorh',
        'label'       => __( 'لون الرابط عند مرور الماوس', 'marvPress' ),
        'desc'        => __( 'يتيح لك هذا الخيار تحديد لون الرابط عن مرور الماوس علية', 'marvPress' ),
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'themeop',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'mainmenu',
        'label'       => __( 'القائمة الرئيسية', 'marvPress' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'tab',
        'section'     => 'themeop',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'colormm',
        'label'       => __( 'لون خلفية القائمة الرئيسية للموقع', 'marvPress' ),
        'desc'        => __( 'هذا الخيار يتيح لك تحديد لون خلفية القائمة الرئيسية الموجودة في أعلى الموقع', 'marvPress' ),
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'themeop',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'mcolora',
        'label'       => __( 'لون الرابط في القائمة الرئيسية', 'marvPress' ),
        'desc'        => __( 'هذا الخيار يتيح لك تحديد لن الربط في القائمة الرئيسية التي في أعلى الموقع.', 'marvPress' ),
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'themeop',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'mcolorh',
        'label'       => __( 'لون الرابط عند مرور الماوس في القائمة الرئيسية', 'marvPress' ),
        'desc'        => __( 'هذا الخيار يتيح لك تحديد لون الرابط الموجود في القائمة الرئيسية الموجودة في اعلى الموقع.', 'marvPress' ),
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'themeop',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'mbuttonch',
        'label'       => __( 'لون خلفية الزر عند مرور الماوس في القائمة الرئيسية', 'marvPress' ),
        'desc'        => __( 'هذا الخيار يتيح لك تحديد لون خلفية الرابط عند المرور علية في القائمة الرئيسية الموجودة في اعلى الموقع.', 'marvPress' ),
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'themeop',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'headerpaner',
        'label'       => __( 'بنر الهيدر', 'marvPress' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'tab',
        'section'     => 'banerop',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'headerbr',
        'label'       => __( 'تفعيل بنر الهيدر', 'marvPress' ),
        'desc'        => __( 'هذا الخيار يتيح لك تفعيل البنر الموجود في الهيدر في أعلى الموقع لجميع الصفحات', 'marvPress' ),
        'std'         => '',
        'type'        => 'on-off',
        'section'     => 'banerop',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'headerbrimg',
        'label'       => __( 'صورة بنر الهيدر', 'marvPress' ),
        'desc'        => __( 'هذا الخيار يتيح لك رفع صورة للبنر الموجود في الهيدر. 
مقاس البنر عرض 720px طول 90px.', 'marvPress' ),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'banerop',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'headerbrurl',
        'label'       => __( 'رابط صفحة الاعلان', 'marvPress' ),
        'desc'        => __( 'هذا الخيار يتيح لك اضافة رابط للانتقال له عن الضغط على البنر.', 'marvPress' ),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'banerop',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'headerbrtitle',
        'label'       => __( 'اسم المعلن', 'marvPress' ),
        'desc'        => __( 'هذا الخيار يتيح لك ادخل اسم الاعلان أو الجهة المعلنة وسوف يظهر عن مرور الماوس علية', 'marvPress' ),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'banerop',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'phone',
        'label'       => __( 'هاتف التواصل', 'marvPress' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => '____________________________________',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'faxc',
        'label'       => __( 'الفاكس', 'marvPress' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => '____________________________________',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'emailr',
        'label'       => __( 'ايميل الذي يرسل له الرسالة', 'marvPress' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => '____________________________________',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'decon',
        'label'       => __( 'النص التعريفي بالصفحة', 'marvPress' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'textarea',
        'section'     => '____________________________________',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'mapxy',
        'label'       => __( 'احداثيات الموقع على الخريطة', 'marvPress' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => '____________________________________',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'mail_list_email',
        'label'       => __( 'رسائل البريد الكتروني', 'marvPress' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'tab',
        'section'     => 'massge_option',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'email_list',
        'label'       => __( 'ايميل الرسائل', 'marvPress' ),
        'desc'        => __( 'هذا الخيار يتيح لك اضافة الايميل الذي يتم ارسال الرسائل من خلالة الى الاعضاء في رسائل القائمة البريدية.', 'marvPress' ),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'massge_option',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      )
    )
  );
  
  /* allow settings to be filtered before saving */
  $custom_settings = apply_filters( ot_settings_id() . '_args', $custom_settings );
  
  /* settings are not the same update the DB */
  if ( $saved_settings !== $custom_settings ) {
    update_option( ot_settings_id(), $custom_settings ); 
  }
  
  /* Lets OptionTree know the UI Builder is being overridden */
  global $ot_has_custom_theme_options;
  $ot_has_custom_theme_options = true;
  
}
<?php

// قائمة روابط الفيديوهات
$videoUrls = [
    'https://tpr-store.blogspot.com/2024/04/Java-code-to-improve-mobile-phone-performance.html',
    'https://tpr-store.blogspot.com/2024/04/How-to-profit-from-YouTube.html',
    'https://tpr-store.blogspot.com/2024/04/The-Java-code-collects-application-packages-and-verifies-whether-they-are-installed-from-Google-Play-or-not.html',
    'https://tpr-store.blogspot.com/2024/04/Profit%20from%20Telegram%20channel%20ads.html',
'https://tpr-store.blogspot.com/2024/04/Profit%20from%20Telegram%20channel%20ads.html',




// ... Add more video URLs here
];

// حساب مؤشر الفيديو الحالي
$currentVideoIndex = 0;

// دالة لعرض iframe للفيديو الحالي
function displayVideoIframe($url) {
    echo '<iframe width="560" height="315" src="' . $url . '" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
}

// عرض iframe للفيديو الأول عند تحميل الصفحة
displayVideoIframe($videoUrls[$currentVideoIndex]);

// تشغيل مهام التبديل بين الفيديوهات
$interval = 1 * 60; // 5 دقائق بالثواني
$timer = new Timer(function() use (&$currentVideoIndex, $videoUrls) {
    // تحديث مؤشر الفيديو
    $currentVideoIndex = ($currentVideoIndex + 1) % count($videoUrls);
    
    // عرض iframe للفيديو الجديد
    displayVideoIframe($videoUrls[$currentVideoIndex]);
}, $interval);

// تشغيل التايمر
$timer->start();

// تشغيل تايمر آخر لإنهاء البرنامج بعد مدة معينة
// (يمكنك إزالته إذا كنت تريد تشغيل التبديل بين الفيديوهات بشكل مستمر)
$endTimer = new Timer(function() {
    echo 'تم إنهاء البرنامج.';
    exit;
}, 60 * 60); // 60 دقيقة بالثواني

$endTimer->start();

// تعريف فصل Timer
class Timer {
    private $callback;
    private $interval;
    private $timerId;

    public function __construct($callback, $interval) {
        $this->callback = $callback;
        $this->interval = $interval;
    }

    public function start() {
        $this->timerId = timer_add($this->interval, $this->callback);
    }

    public function stop() {
        timer_delete($this->timerId);
    }
}

?>

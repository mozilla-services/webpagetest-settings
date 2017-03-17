er 2 Top Sites Benchmark";
$description = "A benchmark to compare Quantum against Firefox and competitor products across a set of global topsites";    // optional
$links = array('Tier 2 Top Sites' => 'https://docs.google.com/spreadsheets/d/1xErRcxgK2eXdJMZAmSwD6wSjz12xoK8rPpIIHdJK87g/edit#gid=0');
$configurations = array();    // ordered list of the configurations to compare (short names)

$configurations['firefox'] = array('title' => 'Firefox Release',
                                   'label' => 'firefox',
                                   'url_file' => 'browsers.txt',
                                   'locations' => array('mtv_thinkpad:Firefox.Cable'),
                                   'settings' => array('runs' => 3,
                                                       'fvonly' => 0,
                                                       'video' => 0,
                                                       'mv' => 0,
                                                       'noopt' => 1,
                                                       'keepua' => 1,
                                                       'priority' => 7));

$configurations['nightly'] = array('title' => 'Firefox Nightly',
                                   'label' => 'firefox',
                                   'url_file' => 'browsers.txt',
                                   'locations' => array('mtv_thinkpad:Nightly.Cable'),
                                   'settings' => array('runs' => 3,
                                                       'fvonly' => 0,
                                                       'video' => 0,
                                                       'mv' => 0,
                                                       'noopt' => 1,
                                                       'keepua' => 1,
                                                       'priority' => 7));

$configurations['chrome'] = array('title' => 'Google Chrome',
                                 'label' => 'chrome',
                                 'url_file' => 'browsers.txt',
                                 'locations' => array('mtv_thinkpad:Chrome.Cable'),
                                 'settings' => array('runs' => 3,
                                                     'fvonly' => 0,
                                                     'video' => 0,
                                                     'mv' => 0,
                                                     'noopt' => 1,
                                                     'keepua' => 1,
                                                     'priority' => 7));

/**
* Logic to determine if it is time for the benchmark to execute
*/
if (!function_exists("browsersShouldExecute")) {
  function browsersShouldExecute($last_execute_time, $current_time) {
    $should_run = false;
    $hours = 0;
      if ($current_time > $last_execute_time)
          $hours = ($current_time - $last_execute_time) / 3600;
    if ((!$last_execute_time || $hours > 5) && gmdate('G') == '7') {   // daily at midnight ET
            $should_run = true;
        }
    return  $should_run;
  }
}
?>

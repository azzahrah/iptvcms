<?php

class IPTV {

    public $channels;
    public $lock_all_devices;
    public $lock_channel_id;
    public $show_advice;
    public $advice_url;

    /*
     * Load Default Setting For Client/Devices
     */

    function load_setting() {
        require_once 'connection.php';

        $settings['locked_all_devices'] = 0;
        $settings['locked_channel_id'] = 0;

        $result = $mysqli->query("SELECT * FROM setting ORDER BY key");
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $settings[$row['key']] = $row['value'];
            }
            $result->free();
        }

        $channels = array();

        $result = $mysqli->query("SELECT * FROM channels ORDER BY name");
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                array_push($channels, $row);
            }
            $result->free();
        }
        $runningtext = array();

        $result = $mysqli->query("SELECT * FROM runningtext ORDER BY id");
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                array_push($runningtext, $row);
            }
            $result->free();
        }
        $mysqli->close();
        $response['channels'] = $channels;
        $response['runningtext'] = $runningtext;
        $response['settings'] = $settings;
        
        return $response;
    }

}
?>

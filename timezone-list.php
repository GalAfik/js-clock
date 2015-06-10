<?php
        $arr = array(
            '-11:00' => 'Pacific/Midway',
            '-10:00' => 'Pacific/Honolulu',
            '-09:00' => 'US/Alaska',
            '-08:00' => 'America/Los_Angeles',
            '-07:00' => 'US/Mountain',
            '-06:00' => 'US/Central',
            '-05:00' => 'US/Eastern',
            '-04:00' => 'Canada/Atlantic',
            '-04:30' => 'America/Caracas',
            '-03:30' => 'Canada/Newfoundland',
            '-03:00' => 'America/Godthab',
            '-02:00' => 'America/Noronha',
            '-01:00' => 'Atlantic/Cape_Verde',
            '+00:00' => 'UTC',
            '+01:00' => 'Europe/Berlin',
            '+02:00' => 'Asia/Jerusalem',
            '+03:00' => 'Asia/Kuwait',
            '+03:30' => 'Asia/Tehran',
            '+04:00' => 'Europe/Moscow',
            '+04:30' => 'Asia/Kabul',
            '+05:00' => 'Asia/Tashkent',
            '+05:30' => 'Asia/Calcutta',
            '+05:45' => 'Asia/Katmandu',
            '+06:00' => 'Asia/Almaty',
            '+06:30' => 'Asia/Rangoon',
            '+07:00' => 'Asia/Bangkok',
            '+08:00' => 'Asia/Hong_Kong',
            '+09:00' => 'Asia/Tokyo',
            '+09:30' => 'Australia/Adelaide',
            '+10:00' => 'Pacific/Guam',
            '+11:00' => 'Asia/Vladivostok',
            '+12:00' => 'Pacific/Fiji',
            '+13:00' => 'Pacific/Tongatapu'
        );
    function getTimezone($offset){
        global $arr;
        $result = ($arr[$offset]) ? $arr[$offset] : 'UTC';
        return $result;
    }
?>
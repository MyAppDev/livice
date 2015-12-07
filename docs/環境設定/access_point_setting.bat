rem 参考:http://ahiru8usagi.hatenablog.com/entry/Windows7_8_8.1_Wi-Fi
rem 参考:http://shopdd.jp/blog-entry-1139.html
rem Windowsへのアクセスポイントの設定
rem ネットワークモードを許可
netsh wlan set hostednetwork mode=allow
rem ssidを設定
netsh wlan set hostednetwork ssid=livice
rem keyを設定
netsh wlan set hostednetwork key=0123456789 keyusage=persistent
rem ネットワークを開始
netsh wlan start hostednetwork

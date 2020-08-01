# turbidity-monitoring-system

This is the final project to complete study at Bogor Agricultural Institute, this project is divided into 2 parts, namely web base and tools with a microcontroller. basically the concept of making this tool is to measure the value of the NTU (Nephelometric Turbidity Unit) in raw water in PDAM Tirta Bhagasasi Bekasi, Indonesia. A microcontroller mounted on a standard water tank will send the results of measurement values that have been calibrated by the Kalman filter method. The data will be sent to a web-based monitoring system which is divided into 2 methods, namely using realtime monitoring charts and resporting methods that can be downloaded directly. This tool is very effective in increasing efficiency and effectiveness in measuring NTU levels of water
![Project](http://4.bp.blogspot.com/-Q5Yw8JOQcro/XhSmxtIjDCI/AAAAAAAAADE/_UtPD0YYS2E4C55FQd-hJEBCSKsbcPpTACK4BGAYYCw/s1600/Picture1cc.png)

The main tool for this turbidity monitoring system is installed in the chemical laboratory of PDAM Tirta Bhagasasi Rawa Lumbu branch, turbidity sensor is installed in IPA 40 (Water Treatment Installation) with a capacity of 40 liters / second by using a 30 meter long UTP (Unshielded Twisted Pair) UTP (Unshielded Twisted Pair) cable for data transmission, and computers in the IT room (Information Technology) Rawa Lumbu which is used as a server computer for web turbidity. The transmission of data on the main device to the server computer using wireless media so that it can facilitate the admin in monitoring

![Project2](http://3.bp.blogspot.com/-H5E0OlKVGJc/XhSmUzjBeoI/AAAAAAAAAC4/euJr8mOVs2U0f9VBwbDc42TeyM-FKXVLQCK4BGAYYCw/s1600/Picture1d.png)

Temperature graph page with layout_7 identity functions to display information in the form of graphs and temperature tables in realtime. This page has no input interactions so it can only be used as an output for temperature monitoring. The process flow on the temperature graph page is the admin can access the page then the system will display data in the form of graphs and tables.

to capture graph monitoring data in realtime using the following queries
```

•	Query1 : $data1 = mysqli_query($koneksi, "select suhu from tbl_suhu_realtime  where ntu>=0 order by waktu desc limit 1");
•	Query2 : $data2 = mysqli_query($koneksi, "select suhu from tbl_suhu_realtime where ntu>=0 order by waktu desc limit 20");
•	Query3 : $data3 = 'select (select count(*) from tbl_suhu) as count, (select count (*) from tbl_suhu where ntu>=120)  as counts,(select count(*) from tbl_suhu where status=0)  as counta ';
•	Query4 : $data4 = mysqli_query($koneksi, "select  waktu from tbl_suhu order by waktu desc limit 24");
```



Δx =  Xa - Xb
= 26.20 – 25-99
= 0.21

Ketepatan  = (1-(∆x/Xa))×100%
= (1-(0.21/26.20))×100%
= (1 – 0.008) ×100%
= 0.992 ×100%
= 99.20 %


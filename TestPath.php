<?php
echo "<html>\n";
echo "<meta charset=\"gb2312\" />\n";
echo "<head>\n";
echo "</head>\n";
echo "<body>\n";
echo "��ʾ�ű��ļ������·�����ļ���:\"".$_SERVER["PHP_SELF"]."\"<br>";

echo "��ʾ������ʹ�õ�CGI�ű��淶:\"".$_SERVER["GATEWAY_INTERFACE"]."\"<br>";

echo "��ʾ��ǰ���нű����ڷ�������IP��ַ:\"".$_SERVER["SERVER_ADDR"]."\"<br>";

echo "��ʾ��ǰ���нű�����������:\"".$_SERVER["SERVER_NAME"]."\"<br>";

echo "��ʾ��ǰ���нű���������ʶ:\"".$_SERVER["SERVER_SOFTWARE"]."\"<br>";

echo "��ʾ����ҳ���ͨ��Э������ƺͰ汾:\"".$_SERVER["SERVER_PROTOCOL"]."\"<br>";

echo "��ʾ����ҳ������󷽷�:\"".$_SERVER["REQUEST_METHOD"]."\"<br>";

echo "��ʾ�ű���ʼ����ʱ��:\"".$_SERVER["REQUEST_TIME"]."\"<br>";

echo "��ʾURL�ʺź���ַ���:\"".$_SERVER["QUERY_STRING"]."\"<br>";

echo "��ʾ��ǰ���нű����ĵ���Ŀ¼:\"".$_SERVER["DOCUMENT_ROOT"]."\"<br>";

echo "��ʾ��ǰAccept�����ͷ��Ϣ:\"".$_SERVER["HTTP_ACCEPT"]."\"<br>";

echo "��ʾ��ǰ������ַ���Ϣ:\"".$_SERVER["HTTP_ACCEPT_CHARSET"]."\"<br>";

echo "��ʾ��ǰ��ǰ�����Accept-Encodingͷ��Ϣ:\"".$_SERVER["HTTP_ACCEPT_ENCODING"]."\"<br>";

echo "��ʾ��ǰ�����Accept-Languageͷ��Ϣ:\"".$_SERVER["HTTP_ACCEPT_LANGUAGE"]."\"<br>";

echo "��ʾ��ǰ�����Connectionͷ��Ϣ:\"".$_SERVER["HTTP_CONNECTION"]."\"<br>";

echo "��ʾ��ǰ�����Hostͷ��Ϣ:\"".$_SERVER["HTTP_HOST"]."\"<br>";

echo "��ʾ��ǰҳ���ǰһ��ҳ���URL��ַ:\"".$_SERVER["HTTP_REFERER"]."\"<br>";

echo "��ʾ��ǰ�����User-Agent��ͷ��Ϣ:\"".$_SERVER["HTTP_USER_AGENT"]."\"<br>";

echo "��ʾ�ű��Ƿ����ͨ��HTTPSЭ����з���:\"".$_SERVER["HTTPS"]."\"<br>";

echo "��ʾ�����ǰҳ���û���IP��ַ:\"".$_SERVER["REMOTE_ADDR"]."\"<br>";

echo "��ʾ�����ǰҳ���û���������:\"".$_SERVER["REMOTE_HOST"]."\"<br>";

echo "��ʾ�û����ӵ�������ʱ��ʹ�õĶ˿�:\"".$_SERVER["REMOTE_PORT"]."\"<br>";

echo "��ʾ��ǰִ�нű��ľ���·����:\"".$_SERVER["SCRIPT_FILENAME"]."\"<br>";

echo "��ʾApache�����ļ��е�SERVER_ADMIN�����������:\"".$_SERVER["SERVER_ADMIN"]."\"<br>";

echo "��ʾ���������ʹ�õĶ˿�,Ĭ��Ϊ\"80\":\"".$_SERVER["SERVER_PORT"]."\"<br>";

echo "��ʾ�������汾���������������ַ���:\"".$_SERVER["SERVER_SIGNATURE"]."\"<br>";

echo "��ʾ�ű����ļ�ϵͳ�еĻ���·��:\"".$_SERVER["PATH_TRANSLATED"]."\"<br>";

echo "��ʾ��ǰ�ű���·��:\"".$_SERVER["SCRIPT_NAME"]."\"<br>";

echo "��ʾ���ʵ�ǰҳ���URI:\"".$_SERVER["REQUEST_URI"]."\"<br>"; 

echo "</body>\n";
echo "</html>";
<?php
$config = array (	
		//应用ID,您的APPID。
		'app_id' => "2021000118682293",

		//商户私钥
		'merchant_private_key' => "MIIEpAIBAAKCAQEA1Yllzs2gTPZjv5dGsyanze6ZFeCMrvgB06ERyedTWvyW/um9My8WA7deeaxh8EWwDDlIJBUCbwpXyf3gUJLWn3KHX0++c8tQVyAVo2b5iueBvC0sBV30KsI7QZ7N1Cqbplnwn7A/J0ZbOKj2IjFYhKMA6m5cGxTx2OmeQ0NLzjbwqwoEmi643irFSrInHNeGQibiqbYxMqU9xItSdtUxhdeHAw5NMzzMruUNZnn6mwlLcYCYrArrVe+ebq9tN0zQiEEBpIkhAENtCc2Iu36SngQsuaDWCDCrxA5+aq7mRhbY8ISjfZFfRdF3b97QNqUIkJuVgQXBgz6W/I/fEMOhAwIDAQABAoIBAH+Pmp/VuoL/VUsopXV0DB47AHxPLft/8CdqOuQwKl1aMyGIpBulbzM9IVTyI3eTSb2jonLbkh6fQR5LaOr5LPkHQ9MuIgmuVQoXApYgd8YA0kGFgpyaKbg5W4ixwyeRZHYVmGbstG1T3D6WwKJgdA6YCX4B+0e6VVdNB9wKoYhHtk7VWEY2y6x7ZGVctTZuBiy6gvFo6gGbJ5f67ePVnMhN5NPEvecQ5ug/osoOKnky2eXS4E94mSwOVxCXUaYKUU/TEYUAO1qQbG4kthoG0KHr8MzEEYnCNFODNfLbNpOJjU+V97G9+e471cvYcbEEw4etLwQgImLqx9UcciTMxLECgYEA7eyPq+HGr6piF1u4zcPZjdQ3jUdgTODL5uWQhXhjPDpBMB60smcNMmV+bd3d362aZW6/fImuG9zn3WbRCHL1x0GNXs+jYwF1MSTGRXGV4Y0nI1YJrNZwlTLBviJQzw4l+P7kz9gj3IqylMMVET7gCyEGqPiy3W0gPWqDDpeVqK8CgYEA5cKFcUU8QHlnWRDnalrDOHQ1MqZUF0fqTn5lXEHkIyj3Mze5d8a20Lj3BcqzA6PPGv9+LSIbraLN5zL1OeAoK1SCbZ3/fYDDH9NkUti6DTHk+7snifwr/k9Wf2cbKWRTlM3IUhXVo5t/8xBL2RaDPmdt9dk3WHW13Ze5WySwue0CgYEArI40SPmvavoMuFoqdvmDEE0ImStaGYez+lsmbNa6ShUJ8Edk0DrTJGjdv/r4juBOqSAgOsd0Afs+IqIOGq2duYy+ZjP7kLOe9ixwrC7MAFCqQQOGctb3wg2U3DvxFapyOdtLwb5FjA7/o8q0vdQ3E3s5ZFUzDEq35jMYp/2iajsCgYEAq5S+7r4TptqDEYKML2Kkk45FBBQujExKcF/39hPG+XLoWLluqkId2HWpFAwx76/vRGw0oCPuo5cHSXdGpvf9R46O8KmjWOhFz4igTTZIiv4N0OgNOQC3Ie3B3Nb0885WlLOwu4xOxSWlQbGT0wT68ilvdr/Gkyskq91YsPYPfGkCgYBBOIIKe2TexYFonYwNXeU9UwBS6E8tDdRO83iGPCOnZLTQPzuDKk8dysZs2+Tmw9s/c+fGgeoALzTtqHovRD1kGfx+5BOi+DU3MRpyihrZxTX54hcmgTeuhleHdmwJxEw1v5Mko6MXfegsOhfILZpYXCPvmDoRtk0cvlKmnnxgQA==",
		
		//异步通知地址
		'notify_url' => "http://外网可访问网关地址/alipay.trade.page.pay-PHP-UTF-8/notify_url.php",
		
		//同步跳转
		'return_url' => "http://www.month.com/alipayBack",

		//编码格式
		'charset' => "UTF-8",

		//签名方式
		'sign_type'=>"RSA2",

		//支付宝网关
		'gatewayUrl' => "https://openapi.alipaydev.com/gateway.do",

		//支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
		'alipay_public_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAg8rxAsZ/qGwP3Zf4fOqmDZRZRW/ikBpE6AmbfgbpeYQiYUAsB0OBdCtp4HWUcOMHxKzac8En2efwrbhmE+nbp0ud0yVPwuzpk7ep/UE/1qM/3OKLjiU8ROFOWIs+znBm0Vu3yi3vXlzOgBJq5ogJOuF6Ex4Qe4af+laDx37cIO9lRJTvWNEvp3A8yWRE2qebD8xYHqMMpwiolDxcbtvkP3dFTcAO3u7q0I+fzU1ZHNoPtP4wjiPLZqp0IqabJadaTUOJbTn8tXJLPW+KePV+bVIwMebI1ZeqL+qTpEIWVWL1C4+wmwb6db/w4ZpOdeEqE+KgG4Jc8Oq4LZrgo28qtwIDAQAB",

        //日志路径
        'log_path' => "",
);
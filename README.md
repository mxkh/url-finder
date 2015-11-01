### Description
This simple library will help you find URLs in the html page or in the text.
Also there is support for popular video services such as Youtube, Rutube, Vimeo.

### Installing
TODO

### How-to
Find first URL in the html page or in the text:

```
$content = file_get_contents('https://www.youtube.com');
$urlFinder = new UrlFinder();
$urls = $urlFinder->url->find($content)->one();
```

Find all URLs in the html page or in the text:

```
$content = file_get_contents('https://www.youtube.com');
$urlFinder = new UrlFinder();
$urls = $urlFinder->url->find($content)->all();
```

Find first Youtube video URL in the html page or in the text:

```
$content = file_get_contents('https://www.youtube.com');
$urlFinder = new UrlFinder();
$urls = $urlFinder->youtube->find($content)->all();
```

Find all Youtube video URLs in the html page or in the text:

```
$content = file_get_contents('https://www.youtube.com');
$urlFinder = new UrlFinder();
$urls = $urlFinder->youtube->find($content)->all();
```
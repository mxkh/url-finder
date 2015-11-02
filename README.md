### Description
This simple library will help you find URLs in the html page or in the text.
Also there is support for popular video services such as Youtube, Rutube, Vimeo.

### Installing
TODO

### How-to
Find first URL in the html page or in the text:

```
$content = '<a href="https://www.youtube.com/watch?v=Fz4F2X1xSc8">Full Resort Segment from "Days of My Youth"</a>
            https://www.youtube.com/watch?v=EhhNOYsAcGQ
            <iframe src="https://player.vimeo.com/video/143534786" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
            <p><a href="https://vimeo.com/143534786">Filthy but Fine</a> from <a href="https://vimeo.com/arthurmetcalf">Arthur Metcalf</a> on <a href="https://vimeo.com">Vimeo</a>.</p>
            http://rutube.ru/video/6af96109ba23424897b961de023126c9/?ref=search';
$urlFinder = new UrlFinder();
$urls = $urlFinder->url->find($content)->one();
```

Find all URLs in the html page or in the text:

```
$urlFinder = new UrlFinder();
$urls = $urlFinder->url->find($content)->all();
```

Find first Youtube video URL in the html page or in the text:

```
$urlFinder = new UrlFinder();
$urls = $urlFinder->youtube->find($content)->one();
```

Find all Youtube video URLs in the html page or in the text:

```
$urlFinder = new UrlFinder();
$urls = $urlFinder->youtube->find($content)->all();
```
Find Vimeo video URL in the html page or in the text:

```
$urlFinder = new UrlFinder();
$urls = $urlFinder->vimeo->find($content)->one();
```

Find all Vimeo video URLs in the html page or in the text:

```
$urlFinder = new UrlFinder();
$urls = $urlFinder->vimeo->find($content)->all();
```
Find RuTube video URL in the html page or in the text:

```
$urlFinder = new UrlFinder();
$urls = $urlFinder->rutube->find($content)->one();
```

Find all RuTube video URLs in the html page or in the text:

```
$urlFinder = new UrlFinder();
$urls = $urlFinder->rutube->find($content)->all();
```

### Thanks to:
jmrware(https://github.com/jmrware) & wwdboer(https://gist.github.com/wwdboer)
for writing the regexps for the Youtube & Vimeo
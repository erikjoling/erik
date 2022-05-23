Documentation
===

Header & navigation vertical space
---

The vertical space in the header is linked to the vertical space in the navigation modal. We use a CSS custom property to align these. Go to Appearance > Custom CSS and use the following code:

```
body {
	--wp--custom--spacing--header-vertical: 3rem;
}
```

Note: currently custom css this doesn't reflect in the block-editor
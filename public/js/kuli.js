$(document).ready(function(){
	function path(){
		var args = arguments,
		result = [];
		for(var i = 0; i < args.length; i++)
		result.push(args[i].replace('@', '/public/syntaxhighlighter/scripts/'));
		return result
	};
	SyntaxHighlighter.autoloader.apply(null, path(  
		'css                    @shBrushCss.js',
		'js jscript javascript  @shBrushJScript.js',
		'py python              @shBrushPython.js',
		'sql                    @shBrushSql.js',
		'bash shell             @shBrushBash.js',
		'cpp c                  @shBrushCpp.js',
		'php                    @shBrushPhp.js',
		'html                   @shBrushHtml.js'
	)); 
	SyntaxHighlighter.config.toolbar = false;
	SyntaxHighlighter.all();
})

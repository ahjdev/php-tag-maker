<?php declare(strict_types=1);

namespace AhjDev\PhpTagMaker\Node\Internal;

use AhjDev\PhpTagMaker\Node;
use AhjDev\PhpTagMaker\HtmlClass;
use AhjDev\PhpTagMaker\Node\HtmlTag;

/**
 * @internal
 * @property HtmlClass $class
 */
trait DefaultTags
{
    public static function __callStatic($method, $args)
    {
        return HtmlTag::make($method, ...$args);
    }

    public static function a(string $uri, Node|string ...$value): self
    {
        return HtmlTag::make('a', ...$value)->setAttribute('href', $uri);
    }

    public static function heading(int $size, Node|string ...$value): self
    {
        return HtmlTag::make("h$size", ...$value);
    }

    /**
     * Defines a section in a document
     */
    public static function div(HtmlClass|string|null $class = null, Node|string ...$value): self
    {
        $tag = HtmlTag::make('div', ...$value);
        if ($class) {
            $tag->class->merge($class);
        }
        return $tag;
    }

    /**
     * Defines an area inside an image map
     */
    public static function area(): self
    {
        return HtmlTag::make('area');
    }

    /**
     * Specifies the base URL/target for all relative URLs in a document
     */
    public static function base(string $uri, string $target): self
    {
        return HtmlTag::make('base')
            ->setAttribute('href', $uri)
            ->setAttribute('target', $target);
    }

    /**
     * Defines a single line break
     */
    public static function br(): self
    {
        return HtmlTag::make('br');
    }

    /**
     * Defines the title of a work
     */
    public static function cite(Node|string ...$value): self
    {
        return HtmlTag::make('cite', ...$value);
    }

    /**
     * Defines a piece of computer code
     */
    public static function code(Node|string ...$value): self
    {
        return HtmlTag::make('code', ...$value);
    }

    /**
     * Specifies column properties for each column within a <colgroup> element
     */
    public static function col(): self
    {
        return HtmlTag::make('col');
    }

    /**
     * Specifies a group of one or more columns in a table for formatting
     */
    public static function colgroup(Node|string ...$value): self
    {
        return HtmlTag::make('colgroup', ...$value);
    }

    /**
     * Adds a machine-readable translation of a given content
     */
    public static function data(Node|string ...$value): self
    {
        return HtmlTag::make('data', ...$value);
    }

    /**
     * Specifies a list of pre-defined options for input controls
     */
    public static function datalist(Node|string ...$value): self
    {
        return HtmlTag::make('datalist', ...$value);
    }

    /**
     * Defines a description/value of a term in a description list
     */
    public static function dd(Node|string ...$value): self
    {
        return HtmlTag::make('dd', ...$value);
    }

    /**
     * Defines text that has been deleted from a document
     */
    public static function del(Node|string ...$value): self
    {
        return HtmlTag::make('del', ...$value);
    }

    /**
     * Defines additional details that the user can view or hide
     */
    public static function details(Node|string ...$value): self
    {
        return HtmlTag::make('details', ...$value);
    }

    /**
     * Specifies a term that is going to be defined within the content
     */
    public static function dfn(Node|string ...$value): self
    {
        return HtmlTag::make('dfn', ...$value);
    }

    /**
     * Defines a dialog box or window
     */
    public static function dialog(Node|string ...$value): self
    {
        return HtmlTag::make('dialog', ...$value);
    }

    /**
     * Defines a description list
     */
    public static function dl(Node|string ...$value): self
    {
        return HtmlTag::make('dl', ...$value);
    }

    /**
     * Defines a term/name in a description list
     */
    public static function dt(Node|string ...$value): self
    {
        return HtmlTag::make('dt', ...$value);
    }

    /**
     * Defines emphasized text
     */
    public static function em(Node|string ...$value): self
    {
        return HtmlTag::make('em', ...$value);
    }

    /**
     * Defines a container for an external application
     */
    public static function embed(string $src, ?int $height = null, ?int $width = null, ?string $type = null): self
    {
        $tag = HtmlTag::make('embed')->setAttribute('src', $src);

        if ($height)
            $tag->setAttribute('height', (string) $height);

        if ($width)
            $tag->setAttribute('width', (string) $width);

        if ($type)
            $tag->setAttribute('type', $type);

        return $tag;
    }

    /**
     * Groups related elements in a form
     */
    public static function fieldset(Node|string ...$value): self
    {
        return HtmlTag::make('fieldset', ...$value);
    }

    /**
     * Defines a caption for a <figure> element
     */
    public static function figcaption(Node|string ...$value): self
    {
        return HtmlTag::make('figcaption', ...$value);
    }

    /**
     * Specifies self-contained content
     */
    public static function figure(Node|string ...$value): self
    {
        return HtmlTag::make('figure', ...$value);
    }

    /**
     * Defines a footer for a document or section
     */
    public static function footer(Node|string ...$value): self
    {
        return HtmlTag::make('footer', ...$value);
    }

    /**
     * Defines an HTML form for user input
     */
    public static function form(Node|string ...$value): self
    {
        return HtmlTag::make('form', ...$value);
    }

    /**
     * Contains metadata/information for the document
     */
    public static function head(Node|string ...$value): self
    {
        return HtmlTag::make('head', ...$value);
    }

    /**
     * Defines a header for a document or section
     */
    public static function header(Node|string ...$value): self
    {
        return HtmlTag::make('header', ...$value);
    }

    /**
     * Defines a header and related content
     */
    public static function hgroup(Node|string ...$value): self
    {
        return HtmlTag::make('hgroup', ...$value);
    }

    /**
     * Defines a thematic change in the content
     */
    public static function hr(): self
    {
        return HtmlTag::make('hr');
    }

    /**
     * Defines the root of an HTML document
     */
    public static function html(Node|string ...$value): self
    {
        return HtmlTag::make('html', ...$value);
    }

    /**
     * Defines a part of text in an alternate voice or mood
     */
    public static function i(Node|string ...$value): self
    {
        return HtmlTag::make('i', ...$value);
    }

    /**
     * Defines an inline frame
     */
    public static function iframe(Node|string ...$value): self
    {
        return HtmlTag::make('iframe', ...$value);
    }

    /**
     * Defines an image
     */
    public static function img(string $src, ?int $height = null, ?int $width = null, ?string $alt = null): self
    {
        $tag = HtmlTag::make('img')->setAttribute('src', $src);

        if ($height)
            $tag->setAttribute('height', (string) $height);

        if ($width)
            $tag->setAttribute('width', (string) $width);

        if ($alt)
            $tag->setAttribute('alt', $alt);

        return $tag;
    }

    /**
     * Defines an input control
     */
    public static function input(string $type = 'text'): self
    {
        return HtmlTag::make('input')->setAttribute('type', $type);
    }

    /**
     * Defines a text that has been inserted into a document
     */
    public static function ins(Node|string ...$value): self
    {
        return HtmlTag::make('ins', ...$value);
    }

    /**
     * Defines keyboard input
     */
    public static function kbd(Node|string ...$value): self
    {
        return HtmlTag::make('kbd', ...$value);
    }

    /**
     * Defines a label for an <input> element
     */
    public static function label(Node|string ...$value): self
    {
        return HtmlTag::make('label', ...$value);
    }

    /**
     * Defines a caption for a <fieldset> element
     */
    public static function legend(Node|string ...$value): self
    {
        return HtmlTag::make('legend', ...$value);
    }

    /**
     * Defines a list item
     */
    public static function li(Node|string ...$value): self
    {
        return HtmlTag::make('li', ...$value);
    }

    /**
     * Defines the relationship between a document and an external resource (most used to link to style sheets)
     */
    public static function link(string $rel, string $uri): self
    {
        return HtmlTag::make('link')
            ->setAttribute('rel', $rel)
            ->setAttribute('href', $uri);
    }

    /**
     * Specifies the main content of a document
     */
    public static function main(Node|string ...$value): self
    {
        return HtmlTag::make('main', ...$value);
    }

    /**
     * Defines an image map
     */
    public static function map(Node|string ...$value): self
    {
        return HtmlTag::make('map', ...$value);
    }

    /**
     * Defines marked/highlighted text
     */
    public static function mark(Node|string ...$value): self
    {
        return HtmlTag::make('mark', ...$value);
    }

    /**
     * Defines an unordered list
     */
    public static function menu(Node|string ...$value): self
    {
        return HtmlTag::make('menu', ...$value);
    }

    /**
     * Defines metadata about an HTML document
     */
    public static function meta(): self
    {
        return HtmlTag::make('meta');
    }

    /**
     * Defines a scalar measurement within a known range (a gauge)
     */
    public static function meter(Node|string ...$value): self
    {
        return HtmlTag::make('meter', ...$value);
    }

    /**
     * Defines navigation links
     */
    public static function nav(Node|string ...$value): self
    {
        return HtmlTag::make('nav', ...$value);
    }

    /**
     * Defines an alternate content for users that do not support client-side scripts
     */
    public static function noscript(Node|string ...$value): self
    {
        return HtmlTag::make('noscript', ...$value);
    }

    /**
     * Defines a container for an external application
     */
    public static function object(Node|string ...$value): self
    {
        return HtmlTag::make('object', ...$value);
    }

    /**
     * Defines an ordered list
     */
    public static function ol(Node|string ...$value): self
    {
        return HtmlTag::make('ol', ...$value);
    }

    /**
     * Defines a group of related options in a drop-down list
     */
    public static function optgroup(Node|string ...$value): self
    {
        return HtmlTag::make('optgroup', ...$value);
    }

    /**
     * Defines an option in a drop-down list
     */
    public static function option(Node|string ...$value): self
    {
        return HtmlTag::make('option', ...$value);
    }

    /**
     * Defines the result of a calculation
     */
    public static function output(Node|string ...$value): self
    {
        return HtmlTag::make('output', ...$value);
    }

    /**
     * Defines a paragraph
     */
    public static function p(Node|string ...$value): self
    {
        return HtmlTag::make('p', ...$value);
    }

    /**
     * Defines a parameter for an object
     */
    public static function param(string $name, string $value): self
    {
        return HtmlTag::make('param')
            ->setAttribute('name', $name)
            ->setAttribute('value', $value);
    }

    /**
     * Defines a container for multiple image resources
     */
    public static function picture(Node|string ...$value): self
    {
        return HtmlTag::make('picture', ...$value);
    }

    /**
     * Defines preformatted text
     */
    public static function pre(Node|string ...$value): self
    {
        return HtmlTag::make('pre', ...$value);
    }

    /**
     * Represents the progress of a task
     */
    public static function progress(Node|string ...$value): self
    {
        return HtmlTag::make('progress', ...$value);
    }

    /**
     * Defines a short quotation
     */
    public static function q(Node|string ...$value): self
    {
        return HtmlTag::make('q', ...$value);
    }

    /**
     * Defines what to show in browsers that do not support ruby annotations
     */
    public static function rp(Node|string ...$value): self
    {
        return HtmlTag::make('rp', ...$value);
    }

    /**
     * Defines an explanation/pronunciation of characters (for East Asian typography)
     */
    public static function rt(Node|string ...$value): self
    {
        return HtmlTag::make('rt', ...$value);
    }

    /**
     * Defines a ruby annotation (for East Asian typography)
     */
    public static function ruby(Node|string ...$value): self
    {
        return HtmlTag::make('ruby', ...$value);
    }

    /**
     * Defines text that is no longer correct
     */
    public static function s(Node|string ...$value): self
    {
        return HtmlTag::make('s', ...$value);
    }

    /**
     * Defines sample output from a computer program
     */
    public static function samp(Node|string ...$value): self
    {
        return HtmlTag::make('samp', ...$value);
    }

    /**
     * Defines a client-side script
     */
    public static function script(Node|string ...$value): self
    {
        return HtmlTag::make('script', ...$value);
    }

    /**
     * Defines a search section
     */
    public static function search(Node|string ...$value): self
    {
        return HtmlTag::make('search', ...$value);
    }

    /**
     * Defines a section in a document
     */
    public static function section(Node|string ...$value): self
    {
        return HtmlTag::make('section', ...$value);
    }

    /**
     * Defines a drop-down list
     */
    public static function select(Node|string ...$value): self
    {
        return HtmlTag::make('select', ...$value);
    }

    /**
     * Defines smaller text
     */
    public static function small(Node|string ...$value): self
    {
        return HtmlTag::make('small', ...$value);
    }

    /**
     * Defines multiple media resources for media elements (<video> and <audio>)
     */
    public static function source(string $src, string $type): self
    {
        return HtmlTag::make('source')
            ->setAttribute('src', $src)
            ->setAttribute('type', $type);
    }

    /**
     * Defines a section in a document
     */
    public static function span(Node|string ...$value): self
    {
        return HtmlTag::make('span', ...$value);
    }

    /**
     * Defines important text
     */
    public static function strong(Node|string ...$value): self
    {
        return HtmlTag::make('strong', ...$value);
    }

    /**
     * Defines style information for a document
     */
    public static function style(Node|string ...$value): self
    {
        return HtmlTag::make('style', ...$value);
    }

    /**
     * Defines subscripted text
     */
    public static function sub(Node|string ...$value): self
    {
        return HtmlTag::make('sub', ...$value);
    }

    /**
     * Defines a visible heading for a <details> element
     */
    public static function summary(Node|string ...$value): self
    {
        return HtmlTag::make('summary', ...$value);
    }

    /**
     * Defines superscripted text
     */
    public static function sup(Node|string ...$value): self
    {
        return HtmlTag::make('sup', ...$value);
    }

    /**
     * Defines a container for SVG graphics
     */
    public static function svg(Node|string ...$value): self
    {
        return HtmlTag::make('svg', ...$value);
    }

    /**
     * Defines a table
     */
    public static function table(Node|string ...$value): self
    {
        return HtmlTag::make('table', ...$value);
    }

    /**
     * Groups the body content in a table
     */
    public static function tbody(Node|string ...$value): self
    {
        return HtmlTag::make('tbody', ...$value);
    }

    /**
     * Defines a cell in a table
     */
    public static function td(Node|string ...$value): self
    {
        return HtmlTag::make('td', ...$value);
    }

    /**
     * Defines a container for content that should be hidden when the page loads
     */
    public static function template(Node|string ...$value): self
    {
        return HtmlTag::make('template', ...$value);
    }

    /**
     * Defines a multiline input control (text area)
     */
    public static function textarea(Node|string ...$value): self
    {
        return HtmlTag::make('textarea', ...$value);
    }

    /**
     * Groups the footer content in a table
     */
    public static function tfoot(Node|string ...$value): self
    {
        return HtmlTag::make('tfoot', ...$value);
    }

    /**
     * Defines a header cell in a table
     */
    public static function th(Node|string ...$value): self
    {
        return HtmlTag::make('th', ...$value);
    }

    /**
     * Groups the header content in a table
     */
    public static function thead(Node|string ...$value): self
    {
        return HtmlTag::make('thead', ...$value);
    }

    /**
     * Defines a specific time (or datetime)
     */
    public static function time(Node|string ...$value): self
    {
        return HtmlTag::make('time', ...$value);
    }

    /**
     * Defines a title for the document
     */
    public static function title(Node|string ...$value): self
    {
        return HtmlTag::make('title', ...$value);
    }

    /**
     * Defines a row in a table
     */
    public static function tr(Node|string ...$value): self
    {
        return HtmlTag::make('tr', ...$value);
    }

    /**
     * Defines text tracks for media elements (<video> and <audio>) Defines teletype text
     */
    public static function track(): self
    {
        return HtmlTag::make('track');
    }

    /**
     * Defines some text that is unarticulated and styled differently from normal text
     */
    public static function u(Node|string ...$value): self
    {
        return HtmlTag::make('u', ...$value);
    }

    /**
     * Defines an unordered list
     */
    public static function ul(Node|string ...$value): self
    {
        return HtmlTag::make('ul', ...$value);
    }

    /**
     * Defines a variable
     */
    public static function var(Node|string ...$value): self
    {
        return HtmlTag::make('var', ...$value);
    }

    /**
     * Defines embedded video content
     */
    public static function video(Node|string ...$value): self
    {
        return HtmlTag::make('video', ...$value);
    }

    /**
     * Defines a possible line-break
     */
    public static function wbr(): self
    {
        return HtmlTag::make('wbr');
    }
}

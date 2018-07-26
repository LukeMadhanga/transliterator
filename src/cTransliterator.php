<?php

/**
 * Comprehensive string converter for PHP < 5.4
 * Supported blocks:
 * Basic Latin
 * Latin-1 Supplement
 * Latin Extended-A
 * Latin Extended-B
 * IPA Extensions Block
 * Spacing Modifier Letters
 * Combining Diacritical Marks
 * Greek and Coptic
 * Cyrillic
 * Cyrillic Supplement
 * Armenian
 * Georgian
 * Latin Extended Additional
 * Greek Extended
 * General Punctuation
 * Superscripts and Subscripts
 * Combining Diacritical Marks for Symbols
 * Georgian Supplement
 * Cyrillic Extended-A
 * Cyrillic Extended-B
 * Latin Extended-D
 */
class cTransliterator {

    private static $fromchars = array(
        "\xe2\x80\x9a",    // ‚ (,)
        "\xc6\x92",    // ƒ (f)
        "\xe2\x80\x9e",    // „ (,,)
        "\xe2\x80\xa6",    // … (...)
        "\xc5\xa0",    // Š (S)
        "\xe2\x80\xb9",    // ‹ (<)
        "\xc5\x92",    // Œ (OE)
        "\xc5\xbd",    // Ž (Z)
        "\xe2\x80\x98",    // ‘ (')
        "\xe2\x80\x99",    // ’ (')
        "\xe2\x80\x9c",    // “ (")
        "\xe2\x80\x9d",    // ” (")
        "\xe2\x80\x93",    // – (-)
        "\xe2\x80\x94",    // — (-)
        "\xc5\xa1",    // š (s)
        "\xe2\x80\xba",    // › (>)
        "\xc5\x93",    // œ (oe)
        "\xc5\xbe",    // ž (z)
        "\xc5\xb8",    // Ÿ (Y)
        "\xc2\xa9",    // © ((C))
        "\xc2\xab",    // « (<<)
        "\xc2\xae",    // ® ((R))
        "\xc2\xbb",    // » (>>)
        "\xc2\xbc",    // ¼ ( 1/4)
        "\xc2\xbd",    // ½ ( 1/2)
        "\xc2\xbe",    // ¾ ( 3/4)
        "\xc3\x80",    // À (A)
        "\xc3\x81",    // Á (A)
        "\xc3\x82",    // Â (A)
        "\xc3\x83",    // Ã (A)
        "\xc3\x84",    // Ä (A)
        "\xc3\x85",    // Å (A)
        "\xc3\x86",    // Æ (AE)
        "\xc3\x87",    // Ç (C)
        "\xc3\x88",    // È (E)
        "\xc3\x89",    // É (E)
        "\xc3\x8a",    // Ê (E)
        "\xc3\x8b",    // Ë (E)
        "\xc3\x8c",    // Ì (I)
        "\xc3\x8d",    // Í (I)
        "\xc3\x8e",    // Î (I)
        "\xc3\x8f",    // Ï (I)
        "\xc3\x90",    // Ð (D)
        "\xc3\x91",    // Ñ (N)
        "\xc3\x92",    // Ò (O)
        "\xc3\x93",    // Ó (O)
        "\xc3\x94",    // Ô (O)
        "\xc3\x95",    // Õ (O)
        "\xc3\x96",    // Ö (O)
        "\xc3\x97",    // × (*)
        "\xc3\x98",    // Ø (O)
        "\xc3\x99",    // Ù (U)
        "\xc3\x9a",    // Ú (U)
        "\xc3\x9b",    // Û (U)
        "\xc3\x9c",    // Ü (U)
        "\xc3\x9d",    // Ý (Y)
        "\xc3\x9e",    // Þ (TH)
        "\xc3\x9f",    // ß (ss)
        "\xc3\xa0",    // à (a)
        "\xc3\xa1",    // á (a)
        "\xc3\xa2",    // â (a)
        "\xc3\xa3",    // ã (a)
        "\xc3\xa4",    // ä (a)
        "\xc3\xa5",    // å (a)
        "\xc3\xa6",    // æ (ae)
        "\xc3\xa7",    // ç (c)
        "\xc3\xa8",    // è (e)
        "\xc3\xa9",    // é (e)
        "\xc3\xaa",    // ê (e)
        "\xc3\xab",    // ë (e)
        "\xc3\xac",    // ì (i)
        "\xc3\xad",    // í (i)
        "\xc3\xae",    // î (i)
        "\xc3\xaf",    // ï (i)
        "\xc3\xb0",    // ð (d)
        "\xc3\xb1",    // ñ (n)
        "\xc3\xb2",    // ò (o)
        "\xc3\xb3",    // ó (o)
        "\xc3\xb4",    // ô (o)
        "\xc3\xb5",    // õ (o)
        "\xc3\xb6",    // ö (o)
        "\xc3\xb7",    // ÷ (/)
        "\xc3\xb8",    // ø (o)
        "\xc3\xb9",    // ù (u)
        "\xc3\xba",    // ú (u)
        "\xc3\xbb",    // û (u)
        "\xc3\xbc",    // ü (u)
        "\xc3\xbd",    // ý (y)
        "\xc3\xbe",    // þ (th)
        "\xc3\xbf",    // ÿ (y)
        "\xc4\x80",    // Ā (A)
        "\xc4\x81",    // ā (a)
        "\xc4\x82",    // Ă (A)
        "\xc4\x83",    // ă (a)
        "\xc4\x84",    // Ą (A)
        "\xc4\x85",    // ą (a)
        "\xc4\x86",    // Ć (C)
        "\xc4\x87",    // ć (c)
        "\xc4\x88",    // Ĉ (C)
        "\xc4\x89",    // ĉ (c)
        "\xc4\x8a",    // Ċ (C)
        "\xc4\x8b",    // ċ (c)
        "\xc4\x8c",    // Č (C)
        "\xc4\x8d",    // č (c)
        "\xc4\x8e",    // Ď (D)
        "\xc4\x8f",    // ď (d)
        "\xc4\x90",    // Đ (D)
        "\xc4\x91",    // đ (d)
        "\xc4\x92",    // Ē (E)
        "\xc4\x93",    // ē (e)
        "\xc4\x94",    // Ĕ (E)
        "\xc4\x95",    // ĕ (e)
        "\xc4\x96",    // Ė (E)
        "\xc4\x97",    // ė (e)
        "\xc4\x98",    // Ę (E)
        "\xc4\x99",    // ę (e)
        "\xc4\x9a",    // Ě (E)
        "\xc4\x9b",    // ě (e)
        "\xc4\x9c",    // Ĝ (G)
        "\xc4\x9d",    // ĝ (g)
        "\xc4\x9e",    // Ğ (G)
        "\xc4\x9f",    // ğ (g)
        "\xc4\xa0",    // Ġ (G)
        "\xc4\xa1",    // ġ (g)
        "\xc4\xa2",    // Ģ (G)
        "\xc4\xa3",    // ģ (g)
        "\xc4\xa4",    // Ĥ (H)
        "\xc4\xa5",    // ĥ (h)
        "\xc4\xa6",    // Ħ (H)
        "\xc4\xa7",    // ħ (h)
        "\xc4\xa8",    // Ĩ (I)
        "\xc4\xa9",    // ĩ (i)
        "\xc4\xaa",    // Ī (I)
        "\xc4\xab",    // ī (i)
        "\xc4\xac",    // Ĭ (I)
        "\xc4\xad",    // ĭ (i)
        "\xc4\xae",    // Į (I)
        "\xc4\xaf",    // į (i)
        "\xc4\xb0",    // İ (I)
        "\xc4\xb1",    // ı (i)
        "\xc4\xb2",    // Ĳ (IJ)
        "\xc4\xb3",    // ĳ (ij)
        "\xc4\xb4",    // Ĵ (J)
        "\xc4\xb5",    // ĵ (j)
        "\xc4\xb6",    // Ķ (K)
        "\xc4\xb7",    // ķ (k)
        "\xc4\xb8",    // ĸ (q)
        "\xc4\xb9",    // Ĺ (L)
        "\xc4\xba",    // ĺ (l)
        "\xc4\xbb",    // Ļ (L)
        "\xc4\xbc",    // ļ (l)
        "\xc4\xbd",    // Ľ (L)
        "\xc4\xbe",    // ľ (l)
        "\xc4\xbf",    // Ŀ (L)
        "\xc5\x80",    // ŀ (l)
        "\xc5\x81",    // Ł (L)
        "\xc5\x82",    // ł (l)
        "\xc5\x83",    // Ń (N)
        "\xc5\x84",    // ń (n)
        "\xc5\x85",    // Ņ (N)
        "\xc5\x86",    // ņ (n)
        "\xc5\x87",    // Ň (N)
        "\xc5\x88",    // ň (n)
        "\xc5\x89",    // ŉ ('n)
        "\xc5\x8a",    // Ŋ (N)
        "\xc5\x8b",    // ŋ (n)
        "\xc5\x8c",    // Ō (O)
        "\xc5\x8d",    // ō (o)
        "\xc5\x8e",    // Ŏ (O)
        "\xc5\x8f",    // ŏ (o)
        "\xc5\x90",    // Ő (O)
        "\xc5\x91",    // ő (o)
        "\xc5\x94",    // Ŕ (R)
        "\xc5\x95",    // ŕ (r)
        "\xc5\x96",    // Ŗ (R)
        "\xc5\x97",    // ŗ (r)
        "\xc5\x98",    // Ř (R)
        "\xc5\x99",    // ř (r)
        "\xc5\x9a",    // Ś (S)
        "\xc5\x9b",    // ś (s)
        "\xc5\x9c",    // Ŝ (S)
        "\xc5\x9d",    // ŝ (s)
        "\xc5\x9e",    // Ş (S)
        "\xc5\x9f",    // ş (s)
        "\xc5\xa2",    // Ţ (T)
        "\xc5\xa3",    // ţ (t)
        "\xc5\xa4",    // Ť (T)
        "\xc5\xa5",    // ť (t)
        "\xc5\xa6",    // Ŧ (T)
        "\xc5\xa7",    // ŧ (t)
        "\xc5\xa8",    // Ũ (U)
        "\xc5\xa9",    // ũ (u)
        "\xc5\xaa",    // Ū (U)
        "\xc5\xab",    // ū (u)
        "\xc5\xac",    // Ŭ (U)
        "\xc5\xad",    // ŭ (u)
        "\xc5\xae",    // Ů (U)
        "\xc5\xaf",    // ů (u)
        "\xc5\xb0",    // Ű (U)
        "\xc5\xb1",    // ű (u)
        "\xc5\xb2",    // Ų (U)
        "\xc5\xb3",    // ų (u)
        "\xc5\xb4",    // Ŵ (W)
        "\xc5\xb5",    // ŵ (w)
        "\xc5\xb6",    // Ŷ (Y)
        "\xc5\xb7",    // ŷ (y)
        "\xc5\xb9",    // Ź (Z)
        "\xc5\xba",    // ź (z)
        "\xc5\xbb",    // Ż (Z)
        "\xc5\xbc",    // ż (z)
        "\xc5\xbf",    // ſ (s)
        "\xc6\x80",    // ƀ (b)
        "\xc6\x81",    // Ɓ (B)
        "\xc6\x82",    // Ƃ (B)
        "\xc6\x83",    // ƃ (b)
        "\xc6\x87",    // Ƈ (C)
        "\xc6\x88",    // ƈ (c)
        "\xc6\x89",    // Ɖ (D)
        "\xc6\x8a",    // Ɗ (D)
        "\xc6\x8b",    // Ƌ (D)
        "\xc6\x8c",    // ƌ (d)
        "\xc6\x90",    // Ɛ (E)
        "\xc6\x91",    // Ƒ (F)
        "\xc6\x93",    // Ɠ (G)
        "\xc6\x95",    // ƕ (hv)
        "\xc6\x96",    // Ɩ (I)
        "\xc6\x97",    // Ɨ (I)
        "\xc6\x98",    // Ƙ (K)
        "\xc6\x99",    // ƙ (k)
        "\xc6\x9a",    // ƚ (l)
        "\xc6\x9d",    // Ɲ (N)
        "\xc6\x9e",    // ƞ (n)
        "\xc6\xa0",    // Ơ (O)
        "\xc6\xa1",    // ơ (o)
        "\xc6\xa2",    // Ƣ (OI)
        "\xc6\xa3",    // ƣ (oi)
        "\xc6\xa4",    // Ƥ (P)
        "\xc6\xa5",    // ƥ (p)
        "\xc6\xab",    // ƫ (t)
        "\xc6\xac",    // Ƭ (T)
        "\xc6\xad",    // ƭ (t)
        "\xc6\xae",    // Ʈ (T)
        "\xc6\xaf",    // Ư (U)
        "\xc6\xb0",    // ư (u)
        "\xc6\xb2",    // Ʋ (V)
        "\xc6\xb3",    // Ƴ (Y)
        "\xc6\xb4",    // ƴ (y)
        "\xc6\xb5",    // Ƶ (Z)
        "\xc6\xb6",    // ƶ (z)
        "\xc7\x84",    // Ǆ (DZ)
        "\xc7\x85",    // ǅ (Dz)
        "\xc7\x86",    // ǆ (dz)
        "\xc7\x87",    // Ǉ (LJ)
        "\xc7\x88",    // ǈ (Lj)
        "\xc7\x89",    // ǉ (lj)
        "\xc7\x8a",    // Ǌ (NJ)
        "\xc7\x8b",    // ǋ (Nj)
        "\xc7\x8c",    // ǌ (nj)
        "\xc7\x8d",    // Ǎ (A)
        "\xc7\x8e",    // ǎ (a)
        "\xc7\x8f",    // Ǐ (I)
        "\xc7\x90",    // ǐ (i)
        "\xc7\x91",    // Ǒ (O)
        "\xc7\x92",    // ǒ (o)
        "\xc7\x93",    // Ǔ (U)
        "\xc7\x94",    // ǔ (u)
        "\xc7\x95",    // Ǖ (U)
        "\xc7\x96",    // ǖ (u)
        "\xc7\x97",    // Ǘ (U)
        "\xc7\x98",    // ǘ (u)
        "\xc7\x99",    // Ǚ (U)
        "\xc7\x9a",    // ǚ (u)
        "\xc7\x9b",    // Ǜ (U)
        "\xc7\x9c",    // ǜ (u)
        "\xc7\x9e",    // Ǟ (A)
        "\xc7\x9f",    // ǟ (a)
        "\xc7\xa0",    // Ǡ (A)
        "\xc7\xa1",    // ǡ (a)
        "\xc7\xa2",    // Ǣ (AE)
        "\xc7\xa3",    // ǣ (ae)
        "\xc7\xa4",    // Ǥ (G)
        "\xc7\xa5",    // ǥ (g)
        "\xc7\xa6",    // Ǧ (G)
        "\xc7\xa7",    // ǧ (g)
        "\xc7\xa8",    // Ǩ (K)
        "\xc7\xa9",    // ǩ (k)
        "\xc7\xaa",    // Ǫ (O)
        "\xc7\xab",    // ǫ (o)
        "\xc7\xac",    // Ǭ (O)
        "\xc7\xad",    // ǭ (o)
        "\xc7\xae",    // Ǯ (Ʒ)
        "\xc7\xaf",    // ǯ (ʒ)
        "\xc7\xb0",    // ǰ (j)
        "\xc7\xb1",    // Ǳ (DZ)
        "\xc7\xb2",    // ǲ (Dz)
        "\xc7\xb3",    // ǳ (dz)
        "\xc7\xb4",    // Ǵ (G)
        "\xc7\xb5",    // ǵ (g)
        "\xc7\xb8",    // Ǹ (N)
        "\xc7\xb9",    // ǹ (n)
        "\xc7\xba",    // Ǻ (A)
        "\xc7\xbb",    // ǻ (a)
        "\xc7\xbc",    // Ǽ (AE)
        "\xc7\xbd",    // ǽ (ae)
        "\xc7\xbe",    // Ǿ (O)
        "\xc7\xbf",    // ǿ (o)
        "\xc8\x80",    // Ȁ (A)
        "\xc8\x81",    // ȁ (a)
        "\xc8\x82",    // Ȃ (A)
        "\xc8\x83",    // ȃ (a)
        "\xc8\x84",    // Ȅ (E)
        "\xc8\x85",    // ȅ (e)
        "\xc8\x86",    // Ȇ (E)
        "\xc8\x87",    // ȇ (e)
        "\xc8\x88",    // Ȉ (I)
        "\xc8\x89",    // ȉ (i)
        "\xc8\x8a",    // Ȋ (I)
        "\xc8\x8b",    // ȋ (i)
        "\xc8\x8c",    // Ȍ (O)
        "\xc8\x8d",    // ȍ (o)
        "\xc8\x8e",    // Ȏ (O)
        "\xc8\x8f",    // ȏ (o)
        "\xc8\x90",    // Ȑ (R)
        "\xc8\x91",    // ȑ (r)
        "\xc8\x92",    // Ȓ (R)
        "\xc8\x93",    // ȓ (r)
        "\xc8\x94",    // Ȕ (U)
        "\xc8\x95",    // ȕ (u)
        "\xc8\x96",    // Ȗ (U)
        "\xc8\x97",    // ȗ (u)
        "\xc8\x98",    // Ș (S)
        "\xc8\x99",    // ș (s)
        "\xc8\x9a",    // Ț (T)
        "\xc8\x9b",    // ț (t)
        "\xc8\x9e",    // Ȟ (H)
        "\xc8\x9f",    // ȟ (h)
        "\xc8\xa1",    // ȡ (d)
        "\xc8\xa4",    // Ȥ (Z)
        "\xc8\xa5",    // ȥ (z)
        "\xc8\xa6",    // Ȧ (A)
        "\xc8\xa7",    // ȧ (a)
        "\xc8\xa8",    // Ȩ (E)
        "\xc8\xa9",    // ȩ (e)
        "\xc8\xaa",    // Ȫ (O)
        "\xc8\xab",    // ȫ (o)
        "\xc8\xac",    // Ȭ (O)
        "\xc8\xad",    // ȭ (o)
        "\xc8\xae",    // Ȯ (O)
        "\xc8\xaf",    // ȯ (o)
        "\xc8\xb0",    // Ȱ (O)
        "\xc8\xb1",    // ȱ (o)
        "\xc8\xb2",    // Ȳ (Y)
        "\xc8\xb3",    // ȳ (y)
        "\xc8\xb4",    // ȴ (l)
        "\xc8\xb5",    // ȵ (n)
        "\xc8\xb6",    // ȶ (t)
        "\xc8\xb7",    // ȷ (j)
        "\xc8\xb8",    // ȸ (db)
        "\xc8\xb9",    // ȹ (qp)
        "\xc8\xba",    // Ⱥ (A)
        "\xc8\xbb",    // Ȼ (C)
        "\xc8\xbc",    // ȼ (c)
        "\xc8\xbd",    // Ƚ (L)
        "\xc8\xbe",    // Ⱦ (T)
        "\xc8\xbf",    // ȿ (s)
        "\xc9\x80",    // ɀ (z)
        "\xc9\x83",    // Ƀ (B)
        "\xc9\x84",    // Ʉ (U)
        "\xc9\x86",    // Ɇ (E)
        "\xc9\x87",    // ɇ (e)
        "\xc9\x88",    // Ɉ (J)
        "\xc9\x89",    // ɉ (j)
        "\xc9\x8c",    // Ɍ (R)
        "\xc9\x8d",    // ɍ (r)
        "\xc9\x8e",    // Ɏ (Y)
        "\xc9\x8f",    // ɏ (y)
        "\xc9\x93",    // ɓ (b)
        "\xc9\x95",    // ɕ (c)
        "\xc9\x96",    // ɖ (d)
        "\xc9\x97",    // ɗ (d)
        "\xc9\x9b",    // ɛ (e)
        "\xc9\x9f",    // ɟ (j)
        "\xc9\xa0",    // ɠ (g)
        "\xc9\xa1",    // ɡ (g)
        "\xc9\xa2",    // ɢ (G)
        "\xc9\xa6",    // ɦ (h)
        "\xc9\xa7",    // ɧ (h)
        "\xc9\xa8",    // ɨ (i)
        "\xc9\xaa",    // ɪ (I)
        "\xc9\xab",    // ɫ (l)
        "\xc9\xac",    // ɬ (l)
        "\xc9\xad",    // ɭ (l)
        "\xc9\xb1",    // ɱ (m)
        "\xc9\xb2",    // ɲ (n)
        "\xc9\xb3",    // ɳ (n)
        "\xc9\xb4",    // ɴ (N)
        "\xc9\xb6",    // ɶ (OE)
        "\xc9\xbc",    // ɼ (r)
        "\xc9\xbd",    // ɽ (r)
        "\xc9\xbe",    // ɾ (r)
        "\xca\x80",    // ʀ (R)
        "\xca\x82",    // ʂ (s)
        "\xca\x88",    // ʈ (t)
        "\xca\x89",    // ʉ (u)
        "\xca\x8b",    // ʋ (v)
        "\xca\x8f",    // ʏ (Y)
        "\xca\x90",    // ʐ (z)
        "\xca\x91",    // ʑ (z)
        "\xca\x99",    // ʙ (B)
        "\xca\x9b",    // ʛ (G)
        "\xca\x9c",    // ʜ (H)
        "\xca\x9d",    // ʝ (j)
        "\xca\x9f",    // ʟ (L)
        "\xca\xa0",    // ʠ (q)
        "\xca\xa3",    // ʣ (dz)
        "\xca\xa5",    // ʥ (dz)
        "\xca\xa6",    // ʦ (ts)
        "\xca\xaa",    // ʪ (ls)
        "\xca\xab",    // ʫ (lz)
        "\xcd\x80",    // ̀ (̀)
        "\xcd\x81",    // ́ (́)
        "\xcd\x83",    // ̓ (̓)
        "\xcd\x84",    // ̈́ (̈́)
        "\xcd\xb4",    // ʹ (ʹ)
        "\xcd\xba",    // ͺ (i)
        "\xcd\xbe",    // ; (;)
        "\xce\x86",    // Ά (A)
        "\xce\x87",    // · (·)
        "\xce\x88",    // Έ (E)
        "\xce\x89",    // Ή (E)
        "\xce\x8a",    // Ί (I)
        "\xce\x8c",    // Ό (O)
        "\xce\x8e",    // Ύ (Y)
        "\xce\x8f",    // Ώ (O)
        "\xce\x90",    // ΐ (i)
        "\xce\x91",    // Α (A)
        "\xce\x92",    // Β (B)
        "\xce\x93",    // Γ (G)
        "\xce\x94",    // Δ (D)
        "\xce\x95",    // Ε (E)
        "\xce\x96",    // Ζ (Z)
        "\xce\x97",    // Η (E)
        "\xce\x98",    // Θ (TH)
        "\xce\x99",    // Ι (I)
        "\xce\x9a",    // Κ (K)
        "\xce\x9b",    // Λ (L)
        "\xce\x9c",    // Μ (M)
        "\xce\x9d",    // Ν (N)
        "\xce\x9e",    // Ξ (X)
        "\xce\x9f",    // Ο (O)
        "\xce\xa0",    // Π (P)
        "\xce\xa1",    // Ρ (R)
        "\xce\xa3",    // Σ (S)
        "\xce\xa4",    // Τ (T)
        "\xce\xa5",    // Υ (Y)
        "\xce\xa6",    // Φ (PH)
        "\xce\xa7",    // Χ (CH)
        "\xce\xa8",    // Ψ (PS)
        "\xce\xa9",    // Ω (O)
        "\xce\xaa",    // Ϊ (I)
        "\xce\xab",    // Ϋ (Y)
        "\xce\xac",    // ά (a)
        "\xce\xad",    // έ (e)
        "\xce\xae",    // ή (e)
        "\xce\xaf",    // ί (i)
        "\xce\xb0",    // ΰ (y)
        "\xce\xb1",    // α (a)
        "\xce\xb2",    // β (b)
        "\xce\xb3",    // γ (g)
        "\xce\xb4",    // δ (d)
        "\xce\xb5",    // ε (e)
        "\xce\xb6",    // ζ (z)
        "\xce\xb7",    // η (e)
        "\xce\xb8",    // θ (th)
        "\xce\xb9",    // ι (i)
        "\xce\xba",    // κ (k)
        "\xce\xbb",    // λ (l)
        "\xce\xbc",    // μ (m)
        "\xce\xbd",    // ν (n)
        "\xce\xbe",    // ξ (x)
        "\xce\xbf",    // ο (o)
        "\xcf\x80",    // π (p)
        "\xcf\x81",    // ρ (r)
        "\xcf\x82",    // ς (s)
        "\xcf\x83",    // σ (s)
        "\xcf\x84",    // τ (t)
        "\xcf\x85",    // υ (y)
        "\xcf\x86",    // φ (ph)
        "\xcf\x87",    // χ (ch)
        "\xcf\x88",    // ψ (ps)
        "\xcf\x89",    // ω (o)
        "\xcf\x8a",    // ϊ (i)
        "\xcf\x8b",    // ϋ (y)
        "\xcf\x8c",    // ό (o)
        "\xcf\x8d",    // ύ (y)
        "\xcf\x8e",    // ώ (o)
        "\xcf\x90",    // ϐ (b)
        "\xcf\x91",    // ϑ (th)
        "\xcf\x92",    // ϒ (Y)
        "\xcf\x93",    // ϓ (Y)
        "\xcf\x94",    // ϔ (Y)
        "\xcf\x95",    // ϕ (ph)
        "\xcf\x96",    // ϖ (p)
        "\xcf\xb0",    // ϰ (k)
        "\xcf\xb1",    // ϱ (r)
        "\xcf\xb2",    // ϲ (s)
        "\xcf\xb3",    // ϳ (j)
        "\xcf\xb4",    // ϴ (TH)
        "\xcf\xb5",    // ϵ (e)
        "\xcf\xb7",    // Ϸ (S)
        "\xcf\xb8",    // ϸ (s)
        "\xcf\xb9",    // Ϲ (S)
        "\xcf\xba",    // Ϻ (S)
        "\xcf\xbb",    // ϻ (s)
        "\xd0\x80",    // Ѐ (E)
        "\xd0\x81",    // Ё (E)
        "\xd0\x82",    // Ђ (D)
        "\xd0\x83",    // Ѓ (G)
        "\xd0\x84",    // Є (E)
        "\xd0\x85",    // Ѕ (Z)
        "\xd0\x86",    // І (I)
        "\xd0\x87",    // Ї (I)
        "\xd0\x88",    // Ј (J)
        "\xd0\x89",    // Љ (L)
        "\xd0\x8a",    // Њ (N)
        "\xd0\x8b",    // Ћ (C)
        "\xd0\x8c",    // Ќ (K)
        "\xd0\x8d",    // Ѝ (I)
        "\xd0\x8e",    // Ў (U)
        "\xd0\x8f",    // Џ (D)
        "\xd0\x90",    // А (A)
        "\xd0\x91",    // Б (B)
        "\xd0\x92",    // В (V)
        "\xd0\x93",    // Г (G)
        "\xd0\x94",    // Д (D)
        "\xd0\x95",    // Е (E)
        "\xd0\x96",    // Ж (Z)
        "\xd0\x97",    // З (Z)
        "\xd0\x98",    // И (I)
        "\xd0\x99",    // Й (J)
        "\xd0\x9a",    // К (K)
        "\xd0\x9b",    // Л (L)
        "\xd0\x9c",    // М (M)
        "\xd0\x9d",    // Н (N)
        "\xd0\x9e",    // О (O)
        "\xd0\x9f",    // П (P)
        "\xd0\xa0",    // Р (R)
        "\xd0\xa1",    // С (S)
        "\xd0\xa2",    // Т (T)
        "\xd0\xa3",    // У (U)
        "\xd0\xa4",    // Ф (F)
        "\xd0\xa5",    // Х (H)
        "\xd0\xa6",    // Ц (C)
        "\xd0\xa7",    // Ч (C)
        "\xd0\xa8",    // Ш (S)
        "\xd0\xa9",    // Щ (S)
        "\xd0\xaa",    // Ъ (ʺ̱)
        "\xd0\xab",    // Ы (Y)
        "\xd0\xac",    // Ь (ʹ̱)
        "\xd0\xad",    // Э (E)
        "\xd0\xae",    // Ю (U)
        "\xd0\xaf",    // Я (A)
        "\xd0\xb0",    // а (a)
        "\xd0\xb1",    // б (b)
        "\xd0\xb2",    // в (v)
        "\xd0\xb3",    // г (g)
        "\xd0\xb4",    // д (d)
        "\xd0\xb5",    // е (e)
        "\xd0\xb6",    // ж (z)
        "\xd0\xb7",    // з (z)
        "\xd0\xb8",    // и (i)
        "\xd0\xb9",    // й (j)
        "\xd0\xba",    // к (k)
        "\xd0\xbb",    // л (l)
        "\xd0\xbc",    // м (m)
        "\xd0\xbd",    // н (n)
        "\xd0\xbe",    // о (o)
        "\xd0\xbf",    // п (p)
        "\xd1\x80",    // р (r)
        "\xd1\x81",    // с (s)
        "\xd1\x82",    // т (t)
        "\xd1\x83",    // у (u)
        "\xd1\x84",    // ф (f)
        "\xd1\x85",    // х (h)
        "\xd1\x86",    // ц (c)
        "\xd1\x87",    // ч (c)
        "\xd1\x88",    // ш (s)
        "\xd1\x89",    // щ (s)
        "\xd1\x8a",    // ъ (ʺ)
        "\xd1\x8b",    // ы (y)
        "\xd1\x8c",    // ь (ʹ)
        "\xd1\x8d",    // э (e)
        "\xd1\x8e",    // ю (u)
        "\xd1\x8f",    // я (a)
        "\xd1\x90",    // ѐ (e)
        "\xd1\x91",    // ё (e)
        "\xd1\x92",    // ђ (d)
        "\xd1\x93",    // ѓ (g)
        "\xd1\x94",    // є (e)
        "\xd1\x95",    // ѕ (z)
        "\xd1\x96",    // і (i)
        "\xd1\x97",    // ї (i)
        "\xd1\x98",    // ј (j)
        "\xd1\x99",    // љ (l)
        "\xd1\x9a",    // њ (n)
        "\xd1\x9b",    // ћ (c)
        "\xd1\x9c",    // ќ (k)
        "\xd1\x9d",    // ѝ (i)
        "\xd1\x9e",    // ў (u)
        "\xd1\x9f",    // џ (d)
        "\xd2\x90",    // Ґ (G)
        "\xd2\x91",    // ґ (g)
        "\xd2\x92",    // Ғ (G)
        "\xd2\x93",    // ғ (g)
        "\xd2\x94",    // Ҕ (G)
        "\xd2\x95",    // ҕ (g)
        "\xd2\x98",    // Ҙ (Z)
        "\xd2\x99",    // ҙ (z)
        "\xd2\x9a",    // Қ (Kˌ)
        "\xd2\x9b",    // қ (kˌ)
        "\xd3\x81",    // Ӂ (Z)
        "\xd3\x82",    // ӂ (z)
        "\xd3\x90",    // Ӑ (A)
        "\xd3\x91",    // ӑ (a)
        "\xd3\x92",    // Ӓ (A)
        "\xd3\x93",    // ӓ (a)
        "\xd3\x94",    // Ӕ (AE)
        "\xd3\x95",    // ӕ (ae)
        "\xd3\x96",    // Ӗ (E)
        "\xd3\x97",    // ӗ (e)
        "\xd3\x98",    // Ә (Ə)
        "\xd3\x99",    // ә (ə)
        "\xd3\x9a",    // Ӛ (Ə)
        "\xd3\x9b",    // ӛ (ə)
        "\xd3\x9c",    // Ӝ (Z)
        "\xd3\x9d",    // ӝ (z)
        "\xd3\x9e",    // Ӟ (Z)
        "\xd3\x9f",    // ӟ (z)
        "\xd3\xa2",    // Ӣ (I)
        "\xd3\xa3",    // ӣ (i)
        "\xd3\xa4",    // Ӥ (I)
        "\xd3\xa5",    // ӥ (i)
        "\xd3\xa6",    // Ӧ (O)
        "\xd3\xa7",    // ӧ (o)
        "\xd3\xac",    // Ӭ (E)
        "\xd3\xad",    // ӭ (e)
        "\xd3\xae",    // Ӯ (U)
        "\xd3\xaf",    // ӯ (u)
        "\xd3\xb0",    // Ӱ (U)
        "\xd3\xb1",    // ӱ (u)
        "\xd3\xb2",    // Ӳ (U)
        "\xd3\xb3",    // ӳ (u)
        "\xd3\xb4",    // Ӵ (C)
        "\xd3\xb5",    // ӵ (c)
        "\xd3\xb8",    // Ӹ (Y)
        "\xd3\xb9",    // ӹ (y)
        "\xd4\xb1",    // Ա (A)
        "\xd4\xb2",    // Բ (B)
        "\xd4\xb3",    // Գ (G)
        "\xd4\xb4",    // Դ (D)
        "\xd4\xb5",    // Ե (E)
        "\xd4\xb6",    // Զ (Z)
        "\xd4\xb7",    // Է (E)
        "\xd4\xb8",    // Ը (Ə)
        "\xd4\xb9",    // Թ (Tʻ)
        "\xd4\xba",    // Ժ (Z)
        "\xd4\xbb",    // Ի (I)
        "\xd4\xbc",    // Լ (L)
        "\xd4\xbd",    // Խ (X)
        "\xd4\xbe",    // Ծ (C)
        "\xd4\xbf",    // Կ (K)
        "\xd5\x80",    // Հ (H)
        "\xd5\x81",    // Ձ (J)
        "\xd5\x82",    // Ղ (G)
        "\xd5\x83",    // Ճ (C)
        "\xd5\x84",    // Մ (M)
        "\xd5\x85",    // Յ (Y)
        "\xd5\x86",    // Ն (N)
        "\xd5\x87",    // Շ (S)
        "\xd5\x88",    // Ո (O)
        "\xd5\x89",    // Չ (Cʻ)
        "\xd5\x8a",    // Պ (P)
        "\xd5\x8b",    // Ջ (J)
        "\xd5\x8c",    // Ռ (R)
        "\xd5\x8d",    // Ս (S)
        "\xd5\x8e",    // Վ (V)
        "\xd5\x8f",    // Տ (T)
        "\xd5\x90",    // Ր (R)
        "\xd5\x91",    // Ց (Cʻ)
        "\xd5\x92",    // Ւ (W)
        "\xd5\x93",    // Փ (Pʻ)
        "\xd5\x94",    // Ք (Kʻ)
        "\xd5\x95",    // Օ (O)
        "\xd5\x96",    // Ֆ (F)
        "\xd5\xa1",    // ա (a)
        "\xd5\xa2",    // բ (b)
        "\xd5\xa3",    // գ (g)
        "\xd5\xa4",    // դ (d)
        "\xd5\xa5",    // ե (e)
        "\xd5\xa6",    // զ (z)
        "\xd5\xa7",    // է (e)
        "\xd5\xa8",    // ը (ə)
        "\xd5\xa9",    // թ (tʻ)
        "\xd5\xaa",    // ժ (z)
        "\xd5\xab",    // ի (i)
        "\xd5\xac",    // լ (l)
        "\xd5\xad",    // խ (x)
        "\xd5\xae",    // ծ (c)
        "\xd5\xaf",    // կ (k)
        "\xd5\xb0",    // հ (h)
        "\xd5\xb1",    // ձ (j)
        "\xd5\xb2",    // ղ (g)
        "\xd5\xb3",    // ճ (c)
        "\xd5\xb4",    // մ (m)
        "\xd5\xb5",    // յ (y)
        "\xd5\xb6",    // ն (n)
        "\xd5\xb7",    // շ (s)
        "\xd5\xb8",    // ո (o)
        "\xd5\xb9",    // չ (cʻ)
        "\xd5\xba",    // պ (p)
        "\xd5\xbb",    // ջ (j)
        "\xd5\xbc",    // ռ (r)
        "\xd5\xbd",    // ս (s)
        "\xd5\xbe",    // վ (v)
        "\xd5\xbf",    // տ (t)
        "\xd6\x80",    // ր (r)
        "\xd6\x81",    // ց (cʻ)
        "\xd6\x82",    // ւ (w)
        "\xd6\x83",    // փ (pʻ)
        "\xd6\x84",    // ք (kʻ)
        "\xd6\x85",    // օ (o)
        "\xd6\x86",    // ֆ (f)
        "\xd6\x87",    // և (ev)
        "\xe1\x83\x90",    // ა (a)
        "\xe1\x83\x91",    // ბ (b)
        "\xe1\x83\x92",    // გ (g)
        "\xe1\x83\x93",    // დ (d)
        "\xe1\x83\x94",    // ე (e)
        "\xe1\x83\x95",    // ვ (v)
        "\xe1\x83\x96",    // ზ (z)
        "\xe1\x83\x97",    // თ (t)
        "\xe1\x83\x98",    // ი (i)
        "\xe1\x83\x99",    // კ (kʼ)
        "\xe1\x83\x9a",    // ლ (l)
        "\xe1\x83\x9b",    // მ (m)
        "\xe1\x83\x9c",    // ნ (n)
        "\xe1\x83\x9d",    // ო (o)
        "\xe1\x83\x9e",    // პ (pʼ)
        "\xe1\x83\x9f",    // ჟ (zh)
        "\xe1\x83\xa0",    // რ (r)
        "\xe1\x83\xa1",    // ს (s)
        "\xe1\x83\xa2",    // ტ (tʼ)
        "\xe1\x83\xa3",    // უ (u)
        "\xe1\x83\xa4",    // ფ (p)
        "\xe1\x83\xa5",    // ქ (k)
        "\xe1\x83\xa6",    // ღ (gh)
        "\xe1\x83\xa7",    // ყ (qʼ)
        "\xe1\x83\xa8",    // შ (sh)
        "\xe1\x83\xa9",    // ჩ (ch)
        "\xe1\x83\xaa",    // ც (ts)
        "\xe1\x83\xab",    // ძ (dz)
        "\xe1\x83\xac",    // წ (tsʼ)
        "\xe1\x83\xad",    // ჭ (chʼ)
        "\xe1\x83\xae",    // ხ (kh)
        "\xe1\x83\xaf",    // ჯ (j)
        "\xe1\x83\xb0",    // ჰ (h)
        "\xe1\x83\xb3",    // ჳ (ui)
        "\xe1\x83\xb4",    // ჴ (q)
        "\xe1\xb8\x80",    // Ḁ (A)
        "\xe1\xb8\x81",    // ḁ (a)
        "\xe1\xb8\x82",    // Ḃ (B)
        "\xe1\xb8\x83",    // ḃ (b)
        "\xe1\xb8\x84",    // Ḅ (B)
        "\xe1\xb8\x85",    // ḅ (b)
        "\xe1\xb8\x86",    // Ḇ (B)
        "\xe1\xb8\x87",    // ḇ (b)
        "\xe1\xb8\x88",    // Ḉ (C)
        "\xe1\xb8\x89",    // ḉ (c)
        "\xe1\xb8\x8a",    // Ḋ (D)
        "\xe1\xb8\x8b",    // ḋ (d)
        "\xe1\xb8\x8c",    // Ḍ (D)
        "\xe1\xb8\x8d",    // ḍ (d)
        "\xe1\xb8\x8e",    // Ḏ (D)
        "\xe1\xb8\x8f",    // ḏ (d)
        "\xe1\xb8\x90",    // Ḑ (D)
        "\xe1\xb8\x91",    // ḑ (d)
        "\xe1\xb8\x92",    // Ḓ (D)
        "\xe1\xb8\x93",    // ḓ (d)
        "\xe1\xb8\x94",    // Ḕ (E)
        "\xe1\xb8\x95",    // ḕ (e)
        "\xe1\xb8\x96",    // Ḗ (E)
        "\xe1\xb8\x97",    // ḗ (e)
        "\xe1\xb8\x98",    // Ḙ (E)
        "\xe1\xb8\x99",    // ḙ (e)
        "\xe1\xb8\x9a",    // Ḛ (E)
        "\xe1\xb8\x9b",    // ḛ (e)
        "\xe1\xb8\x9c",    // Ḝ (E)
        "\xe1\xb8\x9d",    // ḝ (e)
        "\xe1\xb8\x9e",    // Ḟ (F)
        "\xe1\xb8\x9f",    // ḟ (f)
        "\xe1\xb8\xa0",    // Ḡ (G)
        "\xe1\xb8\xa1",    // ḡ (g)
        "\xe1\xb8\xa2",    // Ḣ (H)
        "\xe1\xb8\xa3",    // ḣ (h)
        "\xe1\xb8\xa4",    // Ḥ (H)
        "\xe1\xb8\xa5",    // ḥ (h)
        "\xe1\xb8\xa6",    // Ḧ (H)
        "\xe1\xb8\xa7",    // ḧ (h)
        "\xe1\xb8\xa8",    // Ḩ (H)
        "\xe1\xb8\xa9",    // ḩ (h)
        "\xe1\xb8\xaa",    // Ḫ (H)
        "\xe1\xb8\xab",    // ḫ (h)
        "\xe1\xb8\xac",    // Ḭ (I)
        "\xe1\xb8\xad",    // ḭ (i)
        "\xe1\xb8\xae",    // Ḯ (I)
        "\xe1\xb8\xaf",    // ḯ (i)
        "\xe1\xb8\xb0",    // Ḱ (K)
        "\xe1\xb8\xb1",    // ḱ (k)
        "\xe1\xb8\xb2",    // Ḳ (K)
        "\xe1\xb8\xb3",    // ḳ (k)
        "\xe1\xb8\xb4",    // Ḵ (K)
        "\xe1\xb8\xb5",    // ḵ (k)
        "\xe1\xb8\xb6",    // Ḷ (L)
        "\xe1\xb8\xb7",    // ḷ (l)
        "\xe1\xb8\xb8",    // Ḹ (L)
        "\xe1\xb8\xb9",    // ḹ (l)
        "\xe1\xb8\xba",    // Ḻ (L)
        "\xe1\xb8\xbb",    // ḻ (l)
        "\xe1\xb8\xbc",    // Ḽ (L)
        "\xe1\xb8\xbd",    // ḽ (l)
        "\xe1\xb8\xbe",    // Ḿ (M)
        "\xe1\xb8\xbf",    // ḿ (m)
        "\xe1\xb9\x80",    // Ṁ (M)
        "\xe1\xb9\x81",    // ṁ (m)
        "\xe1\xb9\x82",    // Ṃ (M)
        "\xe1\xb9\x83",    // ṃ (m)
        "\xe1\xb9\x84",    // Ṅ (N)
        "\xe1\xb9\x85",    // ṅ (n)
        "\xe1\xb9\x86",    // Ṇ (N)
        "\xe1\xb9\x87",    // ṇ (n)
        "\xe1\xb9\x88",    // Ṉ (N)
        "\xe1\xb9\x89",    // ṉ (n)
        "\xe1\xb9\x8a",    // Ṋ (N)
        "\xe1\xb9\x8b",    // ṋ (n)
        "\xe1\xb9\x8c",    // Ṍ (O)
        "\xe1\xb9\x8d",    // ṍ (o)
        "\xe1\xb9\x8e",    // Ṏ (O)
        "\xe1\xb9\x8f",    // ṏ (o)
        "\xe1\xb9\x90",    // Ṑ (O)
        "\xe1\xb9\x91",    // ṑ (o)
        "\xe1\xb9\x92",    // Ṓ (O)
        "\xe1\xb9\x93",    // ṓ (o)
        "\xe1\xb9\x94",    // Ṕ (P)
        "\xe1\xb9\x95",    // ṕ (p)
        "\xe1\xb9\x96",    // Ṗ (P)
        "\xe1\xb9\x97",    // ṗ (p)
        "\xe1\xb9\x98",    // Ṙ (R)
        "\xe1\xb9\x99",    // ṙ (r)
        "\xe1\xb9\x9a",    // Ṛ (R)
        "\xe1\xb9\x9b",    // ṛ (r)
        "\xe1\xb9\x9c",    // Ṝ (R)
        "\xe1\xb9\x9d",    // ṝ (r)
        "\xe1\xb9\x9e",    // Ṟ (R)
        "\xe1\xb9\x9f",    // ṟ (r)
        "\xe1\xb9\xa0",    // Ṡ (S)
        "\xe1\xb9\xa1",    // ṡ (s)
        "\xe1\xb9\xa2",    // Ṣ (S)
        "\xe1\xb9\xa3",    // ṣ (s)
        "\xe1\xb9\xa4",    // Ṥ (S)
        "\xe1\xb9\xa5",    // ṥ (s)
        "\xe1\xb9\xa6",    // Ṧ (S)
        "\xe1\xb9\xa7",    // ṧ (s)
        "\xe1\xb9\xa8",    // Ṩ (S)
        "\xe1\xb9\xa9",    // ṩ (s)
        "\xe1\xb9\xaa",    // Ṫ (T)
        "\xe1\xb9\xab",    // ṫ (t)
        "\xe1\xb9\xac",    // Ṭ (T)
        "\xe1\xb9\xad",    // ṭ (t)
        "\xe1\xb9\xae",    // Ṯ (T)
        "\xe1\xb9\xaf",    // ṯ (t)
        "\xe1\xb9\xb0",    // Ṱ (T)
        "\xe1\xb9\xb1",    // ṱ (t)
        "\xe1\xb9\xb2",    // Ṳ (U)
        "\xe1\xb9\xb3",    // ṳ (u)
        "\xe1\xb9\xb4",    // Ṵ (U)
        "\xe1\xb9\xb5",    // ṵ (u)
        "\xe1\xb9\xb6",    // Ṷ (U)
        "\xe1\xb9\xb7",    // ṷ (u)
        "\xe1\xb9\xb8",    // Ṹ (U)
        "\xe1\xb9\xb9",    // ṹ (u)
        "\xe1\xb9\xba",    // Ṻ (U)
        "\xe1\xb9\xbb",    // ṻ (u)
        "\xe1\xb9\xbc",    // Ṽ (V)
        "\xe1\xb9\xbd",    // ṽ (v)
        "\xe1\xb9\xbe",    // Ṿ (V)
        "\xe1\xb9\xbf",    // ṿ (v)
        "\xe1\xba\x80",    // Ẁ (W)
        "\xe1\xba\x81",    // ẁ (w)
        "\xe1\xba\x82",    // Ẃ (W)
        "\xe1\xba\x83",    // ẃ (w)
        "\xe1\xba\x84",    // Ẅ (W)
        "\xe1\xba\x85",    // ẅ (w)
        "\xe1\xba\x86",    // Ẇ (W)
        "\xe1\xba\x87",    // ẇ (w)
        "\xe1\xba\x88",    // Ẉ (W)
        "\xe1\xba\x89",    // ẉ (w)
        "\xe1\xba\x8a",    // Ẋ (X)
        "\xe1\xba\x8b",    // ẋ (x)
        "\xe1\xba\x8c",    // Ẍ (X)
        "\xe1\xba\x8d",    // ẍ (x)
        "\xe1\xba\x8e",    // Ẏ (Y)
        "\xe1\xba\x8f",    // ẏ (y)
        "\xe1\xba\x90",    // Ẑ (Z)
        "\xe1\xba\x91",    // ẑ (z)
        "\xe1\xba\x92",    // Ẓ (Z)
        "\xe1\xba\x93",    // ẓ (z)
        "\xe1\xba\x94",    // Ẕ (Z)
        "\xe1\xba\x95",    // ẕ (z)
        "\xe1\xba\x96",    // ẖ (h)
        "\xe1\xba\x97",    // ẗ (t)
        "\xe1\xba\x98",    // ẘ (w)
        "\xe1\xba\x99",    // ẙ (y)
        "\xe1\xba\x9a",    // ẚ (a)
        "\xe1\xba\x9b",    // ẛ (s)
        "\xe1\xba\x9c",    // ẜ (s)
        "\xe1\xba\x9d",    // ẝ (s)
        "\xe1\xba\x9e",    // ẞ (SS)
        "\xe1\xba\xa0",    // Ạ (A)
        "\xe1\xba\xa1",    // ạ (a)
        "\xe1\xba\xa2",    // Ả (A)
        "\xe1\xba\xa3",    // ả (a)
        "\xe1\xba\xa4",    // Ấ (A)
        "\xe1\xba\xa5",    // ấ (a)
        "\xe1\xba\xa6",    // Ầ (A)
        "\xe1\xba\xa7",    // ầ (a)
        "\xe1\xba\xa8",    // Ẩ (A)
        "\xe1\xba\xa9",    // ẩ (a)
        "\xe1\xba\xaa",    // Ẫ (A)
        "\xe1\xba\xab",    // ẫ (a)
        "\xe1\xba\xac",    // Ậ (A)
        "\xe1\xba\xad",    // ậ (a)
        "\xe1\xba\xae",    // Ắ (A)
        "\xe1\xba\xaf",    // ắ (a)
        "\xe1\xba\xb0",    // Ằ (A)
        "\xe1\xba\xb1",    // ằ (a)
        "\xe1\xba\xb2",    // Ẳ (A)
        "\xe1\xba\xb3",    // ẳ (a)
        "\xe1\xba\xb4",    // Ẵ (A)
        "\xe1\xba\xb5",    // ẵ (a)
        "\xe1\xba\xb6",    // Ặ (A)
        "\xe1\xba\xb7",    // ặ (a)
        "\xe1\xba\xb8",    // Ẹ (E)
        "\xe1\xba\xb9",    // ẹ (e)
        "\xe1\xba\xba",    // Ẻ (E)
        "\xe1\xba\xbb",    // ẻ (e)
        "\xe1\xba\xbc",    // Ẽ (E)
        "\xe1\xba\xbd",    // ẽ (e)
        "\xe1\xba\xbe",    // Ế (E)
        "\xe1\xba\xbf",    // ế (e)
        "\xe1\xbb\x80",    // Ề (E)
        "\xe1\xbb\x81",    // ề (e)
        "\xe1\xbb\x82",    // Ể (E)
        "\xe1\xbb\x83",    // ể (e)
        "\xe1\xbb\x84",    // Ễ (E)
        "\xe1\xbb\x85",    // ễ (e)
        "\xe1\xbb\x86",    // Ệ (E)
        "\xe1\xbb\x87",    // ệ (e)
        "\xe1\xbb\x88",    // Ỉ (I)
        "\xe1\xbb\x89",    // ỉ (i)
        "\xe1\xbb\x8a",    // Ị (I)
        "\xe1\xbb\x8b",    // ị (i)
        "\xe1\xbb\x8c",    // Ọ (O)
        "\xe1\xbb\x8d",    // ọ (o)
        "\xe1\xbb\x8e",    // Ỏ (O)
        "\xe1\xbb\x8f",    // ỏ (o)
        "\xe1\xbb\x90",    // Ố (O)
        "\xe1\xbb\x91",    // ố (o)
        "\xe1\xbb\x92",    // Ồ (O)
        "\xe1\xbb\x93",    // ồ (o)
        "\xe1\xbb\x94",    // Ổ (O)
        "\xe1\xbb\x95",    // ổ (o)
        "\xe1\xbb\x96",    // Ỗ (O)
        "\xe1\xbb\x97",    // ỗ (o)
        "\xe1\xbb\x98",    // Ộ (O)
        "\xe1\xbb\x99",    // ộ (o)
        "\xe1\xbb\x9a",    // Ớ (O)
        "\xe1\xbb\x9b",    // ớ (o)
        "\xe1\xbb\x9c",    // Ờ (O)
        "\xe1\xbb\x9d",    // ờ (o)
        "\xe1\xbb\x9e",    // Ở (O)
        "\xe1\xbb\x9f",    // ở (o)
        "\xe1\xbb\xa0",    // Ỡ (O)
        "\xe1\xbb\xa1",    // ỡ (o)
        "\xe1\xbb\xa2",    // Ợ (O)
        "\xe1\xbb\xa3",    // ợ (o)
        "\xe1\xbb\xa4",    // Ụ (U)
        "\xe1\xbb\xa5",    // ụ (u)
        "\xe1\xbb\xa6",    // Ủ (U)
        "\xe1\xbb\xa7",    // ủ (u)
        "\xe1\xbb\xa8",    // Ứ (U)
        "\xe1\xbb\xa9",    // ứ (u)
        "\xe1\xbb\xaa",    // Ừ (U)
        "\xe1\xbb\xab",    // ừ (u)
        "\xe1\xbb\xac",    // Ử (U)
        "\xe1\xbb\xad",    // ử (u)
        "\xe1\xbb\xae",    // Ữ (U)
        "\xe1\xbb\xaf",    // ữ (u)
        "\xe1\xbb\xb0",    // Ự (U)
        "\xe1\xbb\xb1",    // ự (u)
        "\xe1\xbb\xb2",    // Ỳ (Y)
        "\xe1\xbb\xb3",    // ỳ (y)
        "\xe1\xbb\xb4",    // Ỵ (Y)
        "\xe1\xbb\xb5",    // ỵ (y)
        "\xe1\xbb\xb6",    // Ỷ (Y)
        "\xe1\xbb\xb7",    // ỷ (y)
        "\xe1\xbb\xb8",    // Ỹ (Y)
        "\xe1\xbb\xb9",    // ỹ (y)
        "\xe1\xbb\xba",    // Ỻ (LL)
        "\xe1\xbb\xbb",    // ỻ (ll)
        "\xe1\xbb\xbc",    // Ỽ (V)
        "\xe1\xbb\xbd",    // ỽ (v)
        "\xe1\xbb\xbe",    // Ỿ (Y)
        "\xe1\xbb\xbf",    // ỿ (y)
        "\xe1\xbc\x80",    // ἀ (a)
        "\xe1\xbc\x81",    // ἁ (ha)
        "\xe1\xbc\x82",    // ἂ (a)
        "\xe1\xbc\x83",    // ἃ (ha)
        "\xe1\xbc\x84",    // ἄ (a)
        "\xe1\xbc\x85",    // ἅ (ha)
        "\xe1\xbc\x86",    // ἆ (a)
        "\xe1\xbc\x87",    // ἇ (ha)
        "\xe1\xbc\x88",    // Ἀ (A)
        "\xe1\xbc\x89",    // Ἁ (HA)
        "\xe1\xbc\x8a",    // Ἂ (A)
        "\xe1\xbc\x8b",    // Ἃ (HA)
        "\xe1\xbc\x8c",    // Ἄ (A)
        "\xe1\xbc\x8d",    // Ἅ (HA)
        "\xe1\xbc\x8e",    // Ἆ (A)
        "\xe1\xbc\x8f",    // Ἇ (HA)
        "\xe1\xbc\x90",    // ἐ (e)
        "\xe1\xbc\x91",    // ἑ (he)
        "\xe1\xbc\x92",    // ἒ (e)
        "\xe1\xbc\x93",    // ἓ (he)
        "\xe1\xbc\x94",    // ἔ (e)
        "\xe1\xbc\x95",    // ἕ (he)
        "\xe1\xbc\x98",    // Ἐ (E)
        "\xe1\xbc\x99",    // Ἑ (HE)
        "\xe1\xbc\x9a",    // Ἒ (E)
        "\xe1\xbc\x9b",    // Ἓ (HE)
        "\xe1\xbc\x9c",    // Ἔ (E)
        "\xe1\xbc\x9d",    // Ἕ (HE)
        "\xe1\xbc\xa0",    // ἠ (e)
        "\xe1\xbc\xa1",    // ἡ (he)
        "\xe1\xbc\xa2",    // ἢ (e)
        "\xe1\xbc\xa3",    // ἣ (he)
        "\xe1\xbc\xa4",    // ἤ (e)
        "\xe1\xbc\xa5",    // ἥ (he)
        "\xe1\xbc\xa6",    // ἦ (e)
        "\xe1\xbc\xa7",    // ἧ (he)
        "\xe1\xbc\xa8",    // Ἠ (E)
        "\xe1\xbc\xa9",    // Ἡ (HE)
        "\xe1\xbc\xaa",    // Ἢ (E)
        "\xe1\xbc\xab",    // Ἣ (HE)
        "\xe1\xbc\xac",    // Ἤ (E)
        "\xe1\xbc\xad",    // Ἥ (HE)
        "\xe1\xbc\xae",    // Ἦ (E)
        "\xe1\xbc\xaf",    // Ἧ (HE)
        "\xe1\xbc\xb0",    // ἰ (i)
        "\xe1\xbc\xb1",    // ἱ (hi)
        "\xe1\xbc\xb2",    // ἲ (i)
        "\xe1\xbc\xb3",    // ἳ (hi)
        "\xe1\xbc\xb4",    // ἴ (i)
        "\xe1\xbc\xb5",    // ἵ (hi)
        "\xe1\xbc\xb6",    // ἶ (i)
        "\xe1\xbc\xb7",    // ἷ (hi)
        "\xe1\xbc\xb8",    // Ἰ (I)
        "\xe1\xbc\xb9",    // Ἱ (HI)
        "\xe1\xbc\xba",    // Ἲ (I)
        "\xe1\xbc\xbb",    // Ἳ (HI)
        "\xe1\xbc\xbc",    // Ἴ (I)
        "\xe1\xbc\xbd",    // Ἵ (HI)
        "\xe1\xbc\xbe",    // Ἶ (I)
        "\xe1\xbc\xbf",    // Ἷ (HI)
        "\xe1\xbd\x80",    // ὀ (o)
        "\xe1\xbd\x81",    // ὁ (ho)
        "\xe1\xbd\x82",    // ὂ (o)
        "\xe1\xbd\x83",    // ὃ (ho)
        "\xe1\xbd\x84",    // ὄ (o)
        "\xe1\xbd\x85",    // ὅ (ho)
        "\xe1\xbd\x88",    // Ὀ (O)
        "\xe1\xbd\x89",    // Ὁ (HO)
        "\xe1\xbd\x8a",    // Ὂ (O)
        "\xe1\xbd\x8b",    // Ὃ (HO)
        "\xe1\xbd\x8c",    // Ὄ (O)
        "\xe1\xbd\x8d",    // Ὅ (HO)
        "\xe1\xbd\x90",    // ὐ (y)
        "\xe1\xbd\x91",    // ὑ (hy)
        "\xe1\xbd\x92",    // ὒ (y)
        "\xe1\xbd\x93",    // ὓ (hy)
        "\xe1\xbd\x94",    // ὔ (y)
        "\xe1\xbd\x95",    // ὕ (hy)
        "\xe1\xbd\x96",    // ὖ (y)
        "\xe1\xbd\x97",    // ὗ (hy)
        "\xe1\xbd\x99",    // Ὑ (HY)
        "\xe1\xbd\x9b",    // Ὓ (HY)
        "\xe1\xbd\x9d",    // Ὕ (HY)
        "\xe1\xbd\x9f",    // Ὗ (HY)
        "\xe1\xbd\xa0",    // ὠ (o)
        "\xe1\xbd\xa1",    // ὡ (ho)
        "\xe1\xbd\xa2",    // ὢ (o)
        "\xe1\xbd\xa3",    // ὣ (ho)
        "\xe1\xbd\xa4",    // ὤ (o)
        "\xe1\xbd\xa5",    // ὥ (ho)
        "\xe1\xbd\xa6",    // ὦ (o)
        "\xe1\xbd\xa7",    // ὧ (ho)
        "\xe1\xbd\xa8",    // Ὠ (O)
        "\xe1\xbd\xa9",    // Ὡ (HO)
        "\xe1\xbd\xaa",    // Ὢ (O)
        "\xe1\xbd\xab",    // Ὣ (HO)
        "\xe1\xbd\xac",    // Ὤ (O)
        "\xe1\xbd\xad",    // Ὥ (HO)
        "\xe1\xbd\xae",    // Ὦ (O)
        "\xe1\xbd\xaf",    // Ὧ (HO)
        "\xe1\xbd\xb0",    // ὰ (a)
        "\xe1\xbd\xb1",    // ά (a)
        "\xe1\xbd\xb2",    // ὲ (e)
        "\xe1\xbd\xb3",    // έ (e)
        "\xe1\xbd\xb4",    // ὴ (e)
        "\xe1\xbd\xb5",    // ή (e)
        "\xe1\xbd\xb6",    // ὶ (i)
        "\xe1\xbd\xb7",    // ί (i)
        "\xe1\xbd\xb8",    // ὸ (o)
        "\xe1\xbd\xb9",    // ό (o)
        "\xe1\xbd\xba",    // ὺ (y)
        "\xe1\xbd\xbb",    // ύ (y)
        "\xe1\xbd\xbc",    // ὼ (o)
        "\xe1\xbd\xbd",    // ώ (o)
        "\xe1\xbe\x80",    // ᾀ (ai)
        "\xe1\xbe\x81",    // ᾁ (hai)
        "\xe1\xbe\x82",    // ᾂ (ai)
        "\xe1\xbe\x83",    // ᾃ (hai)
        "\xe1\xbe\x84",    // ᾄ (ai)
        "\xe1\xbe\x85",    // ᾅ (hai)
        "\xe1\xbe\x86",    // ᾆ (ai)
        "\xe1\xbe\x87",    // ᾇ (hai)
        "\xe1\xbe\x88",    // ᾈ (AI)
        "\xe1\xbe\x89",    // ᾉ (HAI)
        "\xe1\xbe\x8a",    // ᾊ (AI)
        "\xe1\xbe\x8b",    // ᾋ (HAI)
        "\xe1\xbe\x8c",    // ᾌ (AI)
        "\xe1\xbe\x8d",    // ᾍ (HAI)
        "\xe1\xbe\x8e",    // ᾎ (AI)
        "\xe1\xbe\x8f",    // ᾏ (HAI)
        "\xe1\xbe\x90",    // ᾐ (ei)
        "\xe1\xbe\x91",    // ᾑ (hei)
        "\xe1\xbe\x92",    // ᾒ (ei)
        "\xe1\xbe\x93",    // ᾓ (hei)
        "\xe1\xbe\x94",    // ᾔ (ei)
        "\xe1\xbe\x95",    // ᾕ (hei)
        "\xe1\xbe\x96",    // ᾖ (ei)
        "\xe1\xbe\x97",    // ᾗ (hei)
        "\xe1\xbe\x98",    // ᾘ (EI)
        "\xe1\xbe\x99",    // ᾙ (HEI)
        "\xe1\xbe\x9a",    // ᾚ (EI)
        "\xe1\xbe\x9b",    // ᾛ (HEI)
        "\xe1\xbe\x9c",    // ᾜ (EI)
        "\xe1\xbe\x9d",    // ᾝ (HEI)
        "\xe1\xbe\x9e",    // ᾞ (EI)
        "\xe1\xbe\x9f",    // ᾟ (HEI)
        "\xe1\xbe\xa0",    // ᾠ (oi)
        "\xe1\xbe\xa1",    // ᾡ (hoi)
        "\xe1\xbe\xa2",    // ᾢ (oi)
        "\xe1\xbe\xa3",    // ᾣ (hoi)
        "\xe1\xbe\xa4",    // ᾤ (oi)
        "\xe1\xbe\xa5",    // ᾥ (hoi)
        "\xe1\xbe\xa6",    // ᾦ (oi)
        "\xe1\xbe\xa7",    // ᾧ (hoi)
        "\xe1\xbe\xa8",    // ᾨ (OI)
        "\xe1\xbe\xa9",    // ᾩ (HOI)
        "\xe1\xbe\xaa",    // ᾪ (OI)
        "\xe1\xbe\xab",    // ᾫ (HOI)
        "\xe1\xbe\xac",    // ᾬ (OI)
        "\xe1\xbe\xad",    // ᾭ (HOI)
        "\xe1\xbe\xae",    // ᾮ (OI)
        "\xe1\xbe\xaf",    // ᾯ (HOI)
        "\xe1\xbe\xb0",    // ᾰ (a)
        "\xe1\xbe\xb1",    // ᾱ (a)
        "\xe1\xbe\xb2",    // ᾲ (ai)
        "\xe1\xbe\xb3",    // ᾳ (ai)
        "\xe1\xbe\xb4",    // ᾴ (ai)
        "\xe1\xbe\xb6",    // ᾶ (a)
        "\xe1\xbe\xb7",    // ᾷ (ai)
        "\xe1\xbe\xb8",    // Ᾰ (A)
        "\xe1\xbe\xb9",    // Ᾱ (A)
        "\xe1\xbe\xba",    // Ὰ (A)
        "\xe1\xbe\xbb",    // Ά (A)
        "\xe1\xbe\xbc",    // ᾼ (AI)
        "\xe1\xbe\xbe",    // ι (i)
        "\xe1\xbf\x81",    // ῁ (¨̂)
        "\xe1\xbf\x82",    // ῂ (ei)
        "\xe1\xbf\x83",    // ῃ (ei)
        "\xe1\xbf\x84",    // ῄ (ei)
        "\xe1\xbf\x86",    // ῆ (e)
        "\xe1\xbf\x87",    // ῇ (ei)
        "\xe1\xbf\x88",    // Ὲ (E)
        "\xe1\xbf\x89",    // Έ (E)
        "\xe1\xbf\x8a",    // Ὴ (E)
        "\xe1\xbf\x8b",    // Ή (E)
        "\xe1\xbf\x8c",    // ῌ (EI)
        "\xe1\xbf\x8f",    // ῏ (᾿̂)
        "\xe1\xbf\x90",    // ῐ (i)
        "\xe1\xbf\x91",    // ῑ (i)
        "\xe1\xbf\x92",    // ῒ (i)
        "\xe1\xbf\x93",    // ΐ (i)
        "\xe1\xbf\x96",    // ῖ (i)
        "\xe1\xbf\x97",    // ῗ (i)
        "\xe1\xbf\x98",    // Ῐ (I)
        "\xe1\xbf\x99",    // Ῑ (I)
        "\xe1\xbf\x9a",    // Ὶ (I)
        "\xe1\xbf\x9b",    // Ί (I)
        "\xe1\xbf\x9f",    // ῟ (῾̂)
        "\xe1\xbf\xa0",    // ῠ (y)
        "\xe1\xbf\xa1",    // ῡ (y)
        "\xe1\xbf\xa2",    // ῢ (y)
        "\xe1\xbf\xa3",    // ΰ (y)
        "\xe1\xbf\xa4",    // ῤ (r)
        "\xe1\xbf\xa5",    // ῥ (rh)
        "\xe1\xbf\xa6",    // ῦ (y)
        "\xe1\xbf\xa7",    // ῧ (y)
        "\xe1\xbf\xa8",    // Ῠ (Y)
        "\xe1\xbf\xa9",    // Ῡ (Y)
        "\xe1\xbf\xaa",    // Ὺ (Y)
        "\xe1\xbf\xab",    // Ύ (Y)
        "\xe1\xbf\xac",    // Ῥ (RH)
        "\xe1\xbf\xb2",    // ῲ (oi)
        "\xe1\xbf\xb3",    // ῳ (oi)
        "\xe1\xbf\xb4",    // ῴ (oi)
        "\xe1\xbf\xb6",    // ῶ (o)
        "\xe1\xbf\xb7",    // ῷ (oi)
        "\xe1\xbf\xb8",    // Ὸ (O)
        "\xe1\xbf\xb9",    // Ό (O)
        "\xe1\xbf\xba",    // Ὼ (O)
        "\xe1\xbf\xbb",    // Ώ (O)
        "\xe1\xbf\xbc",    // ῼ (OI)
        "\xe2\x80\x81",    //   ( )
        "\xe2\x80\x82",    //   ( )
        "\xe2\x80\x83",    //   ( )
        "\xe2\x80\x84",    //   ( )
        "\xe2\x80\x85",    //   ( )
        "\xe2\x80\x86",    //   ( )
        "\xe2\x80\x87",    //   ( )
        "\xe2\x80\x88",    //   ( )
        "\xe2\x80\x89",    //   ( )
        "\xe2\x80\x8a",    //   ( )
        "\xe2\x80\x90",    // ‐ (-)
        "\xe2\x80\x91",    // ‑ (-)
        "\xe2\x80\x92",    // ‒ (-)
        "\xe2\x80\x95",    // ― (-)
        "\xe2\x80\x96",    // ‖ (||)
        "\xe2\x80\x9b",    // ‛ (')
        "\xe2\x80\x9f",    // ‟ (")
        "\xe2\x80\xa4",    // ․ (.)
        "\xe2\x80\xa5",    // ‥ (..)
        "\xe2\x80\xb2",    // ′ (')
        "\xe2\x80\xb3",    // ″ (")
        "\xe2\x80\xbc",    // ‼ (!!)
        "\xe2\x81\x84",    // ⁄ (/)
        "\xe2\x81\x85",    // ⁅ ([)
        "\xe2\x81\x86",    // ⁆ (])
        "\xe2\x81\x87",    // ⁇ (??)
        "\xe2\x81\x88",    // ⁈ (?!)
        "\xe2\x81\x89",    // ⁉ (!?)
        "\xe2\x81\x8e",    // ⁎ (*)
        "\xe2\x81\x9f",    //   ( )
    );
    private static $tochars = array(
        ',',    // ‚
        'f',    // ƒ
        ',,',    // „
        '...',    // …
        'S',    // Š
        '<',    // ‹
        'OE',    // Œ
        'Z',    // Ž
        '\'',    // ‘
        '\'',    // ’
        '"',    // “
        '"',    // ”
        '-',    // –
        '-',    // —
        's',    // š
        '>',    // ›
        'oe',    // œ
        'z',    // ž
        'Y',    // Ÿ
        '(C)',    // ©
        '<<',    // «
        '(R)',    // ®
        '>>',    // »
        ' 1/4',    // ¼
        ' 1/2',    // ½
        ' 3/4',    // ¾
        'A',    // À
        'A',    // Á
        'A',    // Â
        'A',    // Ã
        'A',    // Ä
        'A',    // Å
        'AE',    // Æ
        'C',    // Ç
        'E',    // È
        'E',    // É
        'E',    // Ê
        'E',    // Ë
        'I',    // Ì
        'I',    // Í
        'I',    // Î
        'I',    // Ï
        'D',    // Ð
        'N',    // Ñ
        'O',    // Ò
        'O',    // Ó
        'O',    // Ô
        'O',    // Õ
        'O',    // Ö
        '*',    // ×
        'O',    // Ø
        'U',    // Ù
        'U',    // Ú
        'U',    // Û
        'U',    // Ü
        'Y',    // Ý
        'TH',    // Þ
        'ss',    // ß
        'a',    // à
        'a',    // á
        'a',    // â
        'a',    // ã
        'a',    // ä
        'a',    // å
        'ae',    // æ
        'c',    // ç
        'e',    // è
        'e',    // é
        'e',    // ê
        'e',    // ë
        'i',    // ì
        'i',    // í
        'i',    // î
        'i',    // ï
        'd',    // ð
        'n',    // ñ
        'o',    // ò
        'o',    // ó
        'o',    // ô
        'o',    // õ
        'o',    // ö
        '/',    // ÷
        'o',    // ø
        'u',    // ù
        'u',    // ú
        'u',    // û
        'u',    // ü
        'y',    // ý
        'th',    // þ
        'y',    // ÿ
        'A',    // Ā
        'a',    // ā
        'A',    // Ă
        'a',    // ă
        'A',    // Ą
        'a',    // ą
        'C',    // Ć
        'c',    // ć
        'C',    // Ĉ
        'c',    // ĉ
        'C',    // Ċ
        'c',    // ċ
        'C',    // Č
        'c',    // č
        'D',    // Ď
        'd',    // ď
        'D',    // Đ
        'd',    // đ
        'E',    // Ē
        'e',    // ē
        'E',    // Ĕ
        'e',    // ĕ
        'E',    // Ė
        'e',    // ė
        'E',    // Ę
        'e',    // ę
        'E',    // Ě
        'e',    // ě
        'G',    // Ĝ
        'g',    // ĝ
        'G',    // Ğ
        'g',    // ğ
        'G',    // Ġ
        'g',    // ġ
        'G',    // Ģ
        'g',    // ģ
        'H',    // Ĥ
        'h',    // ĥ
        'H',    // Ħ
        'h',    // ħ
        'I',    // Ĩ
        'i',    // ĩ
        'I',    // Ī
        'i',    // ī
        'I',    // Ĭ
        'i',    // ĭ
        'I',    // Į
        'i',    // į
        'I',    // İ
        'i',    // ı
        'IJ',    // Ĳ
        'ij',    // ĳ
        'J',    // Ĵ
        'j',    // ĵ
        'K',    // Ķ
        'k',    // ķ
        'q',    // ĸ
        'L',    // Ĺ
        'l',    // ĺ
        'L',    // Ļ
        'l',    // ļ
        'L',    // Ľ
        'l',    // ľ
        'L',    // Ŀ
        'l',    // ŀ
        'L',    // Ł
        'l',    // ł
        'N',    // Ń
        'n',    // ń
        'N',    // Ņ
        'n',    // ņ
        'N',    // Ň
        'n',    // ň
        '\'n',    // ŉ
        'N',    // Ŋ
        'n',    // ŋ
        'O',    // Ō
        'o',    // ō
        'O',    // Ŏ
        'o',    // ŏ
        'O',    // Ő
        'o',    // ő
        'R',    // Ŕ
        'r',    // ŕ
        'R',    // Ŗ
        'r',    // ŗ
        'R',    // Ř
        'r',    // ř
        'S',    // Ś
        's',    // ś
        'S',    // Ŝ
        's',    // ŝ
        'S',    // Ş
        's',    // ş
        'T',    // Ţ
        't',    // ţ
        'T',    // Ť
        't',    // ť
        'T',    // Ŧ
        't',    // ŧ
        'U',    // Ũ
        'u',    // ũ
        'U',    // Ū
        'u',    // ū
        'U',    // Ŭ
        'u',    // ŭ
        'U',    // Ů
        'u',    // ů
        'U',    // Ű
        'u',    // ű
        'U',    // Ų
        'u',    // ų
        'W',    // Ŵ
        'w',    // ŵ
        'Y',    // Ŷ
        'y',    // ŷ
        'Z',    // Ź
        'z',    // ź
        'Z',    // Ż
        'z',    // ż
        's',    // ſ
        'b',    // ƀ
        'B',    // Ɓ
        'B',    // Ƃ
        'b',    // ƃ
        'C',    // Ƈ
        'c',    // ƈ
        'D',    // Ɖ
        'D',    // Ɗ
        'D',    // Ƌ
        'd',    // ƌ
        'E',    // Ɛ
        'F',    // Ƒ
        'G',    // Ɠ
        'hv',    // ƕ
        'I',    // Ɩ
        'I',    // Ɨ
        'K',    // Ƙ
        'k',    // ƙ
        'l',    // ƚ
        'N',    // Ɲ
        'n',    // ƞ
        'O',    // Ơ
        'o',    // ơ
        'OI',    // Ƣ
        'oi',    // ƣ
        'P',    // Ƥ
        'p',    // ƥ
        't',    // ƫ
        'T',    // Ƭ
        't',    // ƭ
        'T',    // Ʈ
        'U',    // Ư
        'u',    // ư
        'V',    // Ʋ
        'Y',    // Ƴ
        'y',    // ƴ
        'Z',    // Ƶ
        'z',    // ƶ
        'DZ',    // Ǆ
        'Dz',    // ǅ
        'dz',    // ǆ
        'LJ',    // Ǉ
        'Lj',    // ǈ
        'lj',    // ǉ
        'NJ',    // Ǌ
        'Nj',    // ǋ
        'nj',    // ǌ
        'A',    // Ǎ
        'a',    // ǎ
        'I',    // Ǐ
        'i',    // ǐ
        'O',    // Ǒ
        'o',    // ǒ
        'U',    // Ǔ
        'u',    // ǔ
        'U',    // Ǖ
        'u',    // ǖ
        'U',    // Ǘ
        'u',    // ǘ
        'U',    // Ǚ
        'u',    // ǚ
        'U',    // Ǜ
        'u',    // ǜ
        'A',    // Ǟ
        'a',    // ǟ
        'A',    // Ǡ
        'a',    // ǡ
        'AE',    // Ǣ
        'ae',    // ǣ
        'G',    // Ǥ
        'g',    // ǥ
        'G',    // Ǧ
        'g',    // ǧ
        'K',    // Ǩ
        'k',    // ǩ
        'O',    // Ǫ
        'o',    // ǫ
        'O',    // Ǭ
        'o',    // ǭ
        'Ʒ',    // Ǯ
        'ʒ',    // ǯ
        'j',    // ǰ
        'DZ',    // Ǳ
        'Dz',    // ǲ
        'dz',    // ǳ
        'G',    // Ǵ
        'g',    // ǵ
        'N',    // Ǹ
        'n',    // ǹ
        'A',    // Ǻ
        'a',    // ǻ
        'AE',    // Ǽ
        'ae',    // ǽ
        'O',    // Ǿ
        'o',    // ǿ
        'A',    // Ȁ
        'a',    // ȁ
        'A',    // Ȃ
        'a',    // ȃ
        'E',    // Ȅ
        'e',    // ȅ
        'E',    // Ȇ
        'e',    // ȇ
        'I',    // Ȉ
        'i',    // ȉ
        'I',    // Ȋ
        'i',    // ȋ
        'O',    // Ȍ
        'o',    // ȍ
        'O',    // Ȏ
        'o',    // ȏ
        'R',    // Ȑ
        'r',    // ȑ
        'R',    // Ȓ
        'r',    // ȓ
        'U',    // Ȕ
        'u',    // ȕ
        'U',    // Ȗ
        'u',    // ȗ
        'S',    // Ș
        's',    // ș
        'T',    // Ț
        't',    // ț
        'H',    // Ȟ
        'h',    // ȟ
        'd',    // ȡ
        'Z',    // Ȥ
        'z',    // ȥ
        'A',    // Ȧ
        'a',    // ȧ
        'E',    // Ȩ
        'e',    // ȩ
        'O',    // Ȫ
        'o',    // ȫ
        'O',    // Ȭ
        'o',    // ȭ
        'O',    // Ȯ
        'o',    // ȯ
        'O',    // Ȱ
        'o',    // ȱ
        'Y',    // Ȳ
        'y',    // ȳ
        'l',    // ȴ
        'n',    // ȵ
        't',    // ȶ
        'j',    // ȷ
        'db',    // ȸ
        'qp',    // ȹ
        'A',    // Ⱥ
        'C',    // Ȼ
        'c',    // ȼ
        'L',    // Ƚ
        'T',    // Ⱦ
        's',    // ȿ
        'z',    // ɀ
        'B',    // Ƀ
        'U',    // Ʉ
        'E',    // Ɇ
        'e',    // ɇ
        'J',    // Ɉ
        'j',    // ɉ
        'R',    // Ɍ
        'r',    // ɍ
        'Y',    // Ɏ
        'y',    // ɏ
        'b',    // ɓ
        'c',    // ɕ
        'd',    // ɖ
        'd',    // ɗ
        'e',    // ɛ
        'j',    // ɟ
        'g',    // ɠ
        'g',    // ɡ
        'G',    // ɢ
        'h',    // ɦ
        'h',    // ɧ
        'i',    // ɨ
        'I',    // ɪ
        'l',    // ɫ
        'l',    // ɬ
        'l',    // ɭ
        'm',    // ɱ
        'n',    // ɲ
        'n',    // ɳ
        'N',    // ɴ
        'OE',    // ɶ
        'r',    // ɼ
        'r',    // ɽ
        'r',    // ɾ
        'R',    // ʀ
        's',    // ʂ
        't',    // ʈ
        'u',    // ʉ
        'v',    // ʋ
        'Y',    // ʏ
        'z',    // ʐ
        'z',    // ʑ
        'B',    // ʙ
        'G',    // ʛ
        'H',    // ʜ
        'j',    // ʝ
        'L',    // ʟ
        'q',    // ʠ
        'dz',    // ʣ
        'dz',    // ʥ
        'ts',    // ʦ
        'ls',    // ʪ
        'lz',    // ʫ
        '̀',    // ̀
        '́',    // ́
        '̓',    // ̓
        '̈́',    // ̈́
        'ʹ',    // ʹ
        'i',    // ͺ
        ';',    // ;
        'A',    // Ά
        '·',    // ·
        'E',    // Έ
        'E',    // Ή
        'I',    // Ί
        'O',    // Ό
        'Y',    // Ύ
        'O',    // Ώ
        'i',    // ΐ
        'A',    // Α
        'B',    // Β
        'G',    // Γ
        'D',    // Δ
        'E',    // Ε
        'Z',    // Ζ
        'E',    // Η
        'TH',    // Θ
        'I',    // Ι
        'K',    // Κ
        'L',    // Λ
        'M',    // Μ
        'N',    // Ν
        'X',    // Ξ
        'O',    // Ο
        'P',    // Π
        'R',    // Ρ
        'S',    // Σ
        'T',    // Τ
        'Y',    // Υ
        'PH',    // Φ
        'CH',    // Χ
        'PS',    // Ψ
        'O',    // Ω
        'I',    // Ϊ
        'Y',    // Ϋ
        'a',    // ά
        'e',    // έ
        'e',    // ή
        'i',    // ί
        'y',    // ΰ
        'a',    // α
        'b',    // β
        'g',    // γ
        'd',    // δ
        'e',    // ε
        'z',    // ζ
        'e',    // η
        'th',    // θ
        'i',    // ι
        'k',    // κ
        'l',    // λ
        'm',    // μ
        'n',    // ν
        'x',    // ξ
        'o',    // ο
        'p',    // π
        'r',    // ρ
        's',    // ς
        's',    // σ
        't',    // τ
        'y',    // υ
        'ph',    // φ
        'ch',    // χ
        'ps',    // ψ
        'o',    // ω
        'i',    // ϊ
        'y',    // ϋ
        'o',    // ό
        'y',    // ύ
        'o',    // ώ
        'b',    // ϐ
        'th',    // ϑ
        'Y',    // ϒ
        'Y',    // ϓ
        'Y',    // ϔ
        'ph',    // ϕ
        'p',    // ϖ
        'k',    // ϰ
        'r',    // ϱ
        's',    // ϲ
        'j',    // ϳ
        'TH',    // ϴ
        'e',    // ϵ
        'S',    // Ϸ
        's',    // ϸ
        'S',    // Ϲ
        'S',    // Ϻ
        's',    // ϻ
        'E',    // Ѐ
        'E',    // Ё
        'D',    // Ђ
        'G',    // Ѓ
        'E',    // Є
        'Z',    // Ѕ
        'I',    // І
        'I',    // Ї
        'J',    // Ј
        'L',    // Љ
        'N',    // Њ
        'C',    // Ћ
        'K',    // Ќ
        'I',    // Ѝ
        'U',    // Ў
        'D',    // Џ
        'A',    // А
        'B',    // Б
        'V',    // В
        'G',    // Г
        'D',    // Д
        'E',    // Е
        'Z',    // Ж
        'Z',    // З
        'I',    // И
        'J',    // Й
        'K',    // К
        'L',    // Л
        'M',    // М
        'N',    // Н
        'O',    // О
        'P',    // П
        'R',    // Р
        'S',    // С
        'T',    // Т
        'U',    // У
        'F',    // Ф
        'H',    // Х
        'C',    // Ц
        'C',    // Ч
        'S',    // Ш
        'S',    // Щ
        'ʺ̱',    // Ъ
        'Y',    // Ы
        'ʹ̱',    // Ь
        'E',    // Э
        'U',    // Ю
        'A',    // Я
        'a',    // а
        'b',    // б
        'v',    // в
        'g',    // г
        'd',    // д
        'e',    // е
        'z',    // ж
        'z',    // з
        'i',    // и
        'j',    // й
        'k',    // к
        'l',    // л
        'm',    // м
        'n',    // н
        'o',    // о
        'p',    // п
        'r',    // р
        's',    // с
        't',    // т
        'u',    // у
        'f',    // ф
        'h',    // х
        'c',    // ц
        'c',    // ч
        's',    // ш
        's',    // щ
        'ʺ',    // ъ
        'y',    // ы
        'ʹ',    // ь
        'e',    // э
        'u',    // ю
        'a',    // я
        'e',    // ѐ
        'e',    // ё
        'd',    // ђ
        'g',    // ѓ
        'e',    // є
        'z',    // ѕ
        'i',    // і
        'i',    // ї
        'j',    // ј
        'l',    // љ
        'n',    // њ
        'c',    // ћ
        'k',    // ќ
        'i',    // ѝ
        'u',    // ў
        'd',    // џ
        'G',    // Ґ
        'g',    // ґ
        'G',    // Ғ
        'g',    // ғ
        'G',    // Ҕ
        'g',    // ҕ
        'Z',    // Ҙ
        'z',    // ҙ
        'Kˌ',    // Қ
        'kˌ',    // қ
        'Z',    // Ӂ
        'z',    // ӂ
        'A',    // Ӑ
        'a',    // ӑ
        'A',    // Ӓ
        'a',    // ӓ
        'AE',    // Ӕ
        'ae',    // ӕ
        'E',    // Ӗ
        'e',    // ӗ
        'Ə',    // Ә
        'ə',    // ә
        'Ə',    // Ӛ
        'ə',    // ӛ
        'Z',    // Ӝ
        'z',    // ӝ
        'Z',    // Ӟ
        'z',    // ӟ
        'I',    // Ӣ
        'i',    // ӣ
        'I',    // Ӥ
        'i',    // ӥ
        'O',    // Ӧ
        'o',    // ӧ
        'E',    // Ӭ
        'e',    // ӭ
        'U',    // Ӯ
        'u',    // ӯ
        'U',    // Ӱ
        'u',    // ӱ
        'U',    // Ӳ
        'u',    // ӳ
        'C',    // Ӵ
        'c',    // ӵ
        'Y',    // Ӹ
        'y',    // ӹ
        'A',    // Ա
        'B',    // Բ
        'G',    // Գ
        'D',    // Դ
        'E',    // Ե
        'Z',    // Զ
        'E',    // Է
        'Ə',    // Ը
        'Tʻ',    // Թ
        'Z',    // Ժ
        'I',    // Ի
        'L',    // Լ
        'X',    // Խ
        'C',    // Ծ
        'K',    // Կ
        'H',    // Հ
        'J',    // Ձ
        'G',    // Ղ
        'C',    // Ճ
        'M',    // Մ
        'Y',    // Յ
        'N',    // Ն
        'S',    // Շ
        'O',    // Ո
        'Cʻ',    // Չ
        'P',    // Պ
        'J',    // Ջ
        'R',    // Ռ
        'S',    // Ս
        'V',    // Վ
        'T',    // Տ
        'R',    // Ր
        'Cʻ',    // Ց
        'W',    // Ւ
        'Pʻ',    // Փ
        'Kʻ',    // Ք
        'O',    // Օ
        'F',    // Ֆ
        'a',    // ա
        'b',    // բ
        'g',    // գ
        'd',    // դ
        'e',    // ե
        'z',    // զ
        'e',    // է
        'ə',    // ը
        'tʻ',    // թ
        'z',    // ժ
        'i',    // ի
        'l',    // լ
        'x',    // խ
        'c',    // ծ
        'k',    // կ
        'h',    // հ
        'j',    // ձ
        'g',    // ղ
        'c',    // ճ
        'm',    // մ
        'y',    // յ
        'n',    // ն
        's',    // շ
        'o',    // ո
        'cʻ',    // չ
        'p',    // պ
        'j',    // ջ
        'r',    // ռ
        's',    // ս
        'v',    // վ
        't',    // տ
        'r',    // ր
        'cʻ',    // ց
        'w',    // ւ
        'pʻ',    // փ
        'kʻ',    // ք
        'o',    // օ
        'f',    // ֆ
        'ev',    // և
        'a',    // ა
        'b',    // ბ
        'g',    // გ
        'd',    // დ
        'e',    // ე
        'v',    // ვ
        'z',    // ზ
        't',    // თ
        'i',    // ი
        'kʼ',    // კ
        'l',    // ლ
        'm',    // მ
        'n',    // ნ
        'o',    // ო
        'pʼ',    // პ
        'zh',    // ჟ
        'r',    // რ
        's',    // ს
        'tʼ',    // ტ
        'u',    // უ
        'p',    // ფ
        'k',    // ქ
        'gh',    // ღ
        'qʼ',    // ყ
        'sh',    // შ
        'ch',    // ჩ
        'ts',    // ც
        'dz',    // ძ
        'tsʼ',    // წ
        'chʼ',    // ჭ
        'kh',    // ხ
        'j',    // ჯ
        'h',    // ჰ
        'ui',    // ჳ
        'q',    // ჴ
        'A',    // Ḁ
        'a',    // ḁ
        'B',    // Ḃ
        'b',    // ḃ
        'B',    // Ḅ
        'b',    // ḅ
        'B',    // Ḇ
        'b',    // ḇ
        'C',    // Ḉ
        'c',    // ḉ
        'D',    // Ḋ
        'd',    // ḋ
        'D',    // Ḍ
        'd',    // ḍ
        'D',    // Ḏ
        'd',    // ḏ
        'D',    // Ḑ
        'd',    // ḑ
        'D',    // Ḓ
        'd',    // ḓ
        'E',    // Ḕ
        'e',    // ḕ
        'E',    // Ḗ
        'e',    // ḗ
        'E',    // Ḙ
        'e',    // ḙ
        'E',    // Ḛ
        'e',    // ḛ
        'E',    // Ḝ
        'e',    // ḝ
        'F',    // Ḟ
        'f',    // ḟ
        'G',    // Ḡ
        'g',    // ḡ
        'H',    // Ḣ
        'h',    // ḣ
        'H',    // Ḥ
        'h',    // ḥ
        'H',    // Ḧ
        'h',    // ḧ
        'H',    // Ḩ
        'h',    // ḩ
        'H',    // Ḫ
        'h',    // ḫ
        'I',    // Ḭ
        'i',    // ḭ
        'I',    // Ḯ
        'i',    // ḯ
        'K',    // Ḱ
        'k',    // ḱ
        'K',    // Ḳ
        'k',    // ḳ
        'K',    // Ḵ
        'k',    // ḵ
        'L',    // Ḷ
        'l',    // ḷ
        'L',    // Ḹ
        'l',    // ḹ
        'L',    // Ḻ
        'l',    // ḻ
        'L',    // Ḽ
        'l',    // ḽ
        'M',    // Ḿ
        'm',    // ḿ
        'M',    // Ṁ
        'm',    // ṁ
        'M',    // Ṃ
        'm',    // ṃ
        'N',    // Ṅ
        'n',    // ṅ
        'N',    // Ṇ
        'n',    // ṇ
        'N',    // Ṉ
        'n',    // ṉ
        'N',    // Ṋ
        'n',    // ṋ
        'O',    // Ṍ
        'o',    // ṍ
        'O',    // Ṏ
        'o',    // ṏ
        'O',    // Ṑ
        'o',    // ṑ
        'O',    // Ṓ
        'o',    // ṓ
        'P',    // Ṕ
        'p',    // ṕ
        'P',    // Ṗ
        'p',    // ṗ
        'R',    // Ṙ
        'r',    // ṙ
        'R',    // Ṛ
        'r',    // ṛ
        'R',    // Ṝ
        'r',    // ṝ
        'R',    // Ṟ
        'r',    // ṟ
        'S',    // Ṡ
        's',    // ṡ
        'S',    // Ṣ
        's',    // ṣ
        'S',    // Ṥ
        's',    // ṥ
        'S',    // Ṧ
        's',    // ṧ
        'S',    // Ṩ
        's',    // ṩ
        'T',    // Ṫ
        't',    // ṫ
        'T',    // Ṭ
        't',    // ṭ
        'T',    // Ṯ
        't',    // ṯ
        'T',    // Ṱ
        't',    // ṱ
        'U',    // Ṳ
        'u',    // ṳ
        'U',    // Ṵ
        'u',    // ṵ
        'U',    // Ṷ
        'u',    // ṷ
        'U',    // Ṹ
        'u',    // ṹ
        'U',    // Ṻ
        'u',    // ṻ
        'V',    // Ṽ
        'v',    // ṽ
        'V',    // Ṿ
        'v',    // ṿ
        'W',    // Ẁ
        'w',    // ẁ
        'W',    // Ẃ
        'w',    // ẃ
        'W',    // Ẅ
        'w',    // ẅ
        'W',    // Ẇ
        'w',    // ẇ
        'W',    // Ẉ
        'w',    // ẉ
        'X',    // Ẋ
        'x',    // ẋ
        'X',    // Ẍ
        'x',    // ẍ
        'Y',    // Ẏ
        'y',    // ẏ
        'Z',    // Ẑ
        'z',    // ẑ
        'Z',    // Ẓ
        'z',    // ẓ
        'Z',    // Ẕ
        'z',    // ẕ
        'h',    // ẖ
        't',    // ẗ
        'w',    // ẘ
        'y',    // ẙ
        'a',    // ẚ
        's',    // ẛ
        's',    // ẜ
        's',    // ẝ
        'SS',    // ẞ
        'A',    // Ạ
        'a',    // ạ
        'A',    // Ả
        'a',    // ả
        'A',    // Ấ
        'a',    // ấ
        'A',    // Ầ
        'a',    // ầ
        'A',    // Ẩ
        'a',    // ẩ
        'A',    // Ẫ
        'a',    // ẫ
        'A',    // Ậ
        'a',    // ậ
        'A',    // Ắ
        'a',    // ắ
        'A',    // Ằ
        'a',    // ằ
        'A',    // Ẳ
        'a',    // ẳ
        'A',    // Ẵ
        'a',    // ẵ
        'A',    // Ặ
        'a',    // ặ
        'E',    // Ẹ
        'e',    // ẹ
        'E',    // Ẻ
        'e',    // ẻ
        'E',    // Ẽ
        'e',    // ẽ
        'E',    // Ế
        'e',    // ế
        'E',    // Ề
        'e',    // ề
        'E',    // Ể
        'e',    // ể
        'E',    // Ễ
        'e',    // ễ
        'E',    // Ệ
        'e',    // ệ
        'I',    // Ỉ
        'i',    // ỉ
        'I',    // Ị
        'i',    // ị
        'O',    // Ọ
        'o',    // ọ
        'O',    // Ỏ
        'o',    // ỏ
        'O',    // Ố
        'o',    // ố
        'O',    // Ồ
        'o',    // ồ
        'O',    // Ổ
        'o',    // ổ
        'O',    // Ỗ
        'o',    // ỗ
        'O',    // Ộ
        'o',    // ộ
        'O',    // Ớ
        'o',    // ớ
        'O',    // Ờ
        'o',    // ờ
        'O',    // Ở
        'o',    // ở
        'O',    // Ỡ
        'o',    // ỡ
        'O',    // Ợ
        'o',    // ợ
        'U',    // Ụ
        'u',    // ụ
        'U',    // Ủ
        'u',    // ủ
        'U',    // Ứ
        'u',    // ứ
        'U',    // Ừ
        'u',    // ừ
        'U',    // Ử
        'u',    // ử
        'U',    // Ữ
        'u',    // ữ
        'U',    // Ự
        'u',    // ự
        'Y',    // Ỳ
        'y',    // ỳ
        'Y',    // Ỵ
        'y',    // ỵ
        'Y',    // Ỷ
        'y',    // ỷ
        'Y',    // Ỹ
        'y',    // ỹ
        'LL',    // Ỻ
        'll',    // ỻ
        'V',    // Ỽ
        'v',    // ỽ
        'Y',    // Ỿ
        'y',    // ỿ
        'a',    // ἀ
        'ha',    // ἁ
        'a',    // ἂ
        'ha',    // ἃ
        'a',    // ἄ
        'ha',    // ἅ
        'a',    // ἆ
        'ha',    // ἇ
        'A',    // Ἀ
        'HA',    // Ἁ
        'A',    // Ἂ
        'HA',    // Ἃ
        'A',    // Ἄ
        'HA',    // Ἅ
        'A',    // Ἆ
        'HA',    // Ἇ
        'e',    // ἐ
        'he',    // ἑ
        'e',    // ἒ
        'he',    // ἓ
        'e',    // ἔ
        'he',    // ἕ
        'E',    // Ἐ
        'HE',    // Ἑ
        'E',    // Ἒ
        'HE',    // Ἓ
        'E',    // Ἔ
        'HE',    // Ἕ
        'e',    // ἠ
        'he',    // ἡ
        'e',    // ἢ
        'he',    // ἣ
        'e',    // ἤ
        'he',    // ἥ
        'e',    // ἦ
        'he',    // ἧ
        'E',    // Ἠ
        'HE',    // Ἡ
        'E',    // Ἢ
        'HE',    // Ἣ
        'E',    // Ἤ
        'HE',    // Ἥ
        'E',    // Ἦ
        'HE',    // Ἧ
        'i',    // ἰ
        'hi',    // ἱ
        'i',    // ἲ
        'hi',    // ἳ
        'i',    // ἴ
        'hi',    // ἵ
        'i',    // ἶ
        'hi',    // ἷ
        'I',    // Ἰ
        'HI',    // Ἱ
        'I',    // Ἲ
        'HI',    // Ἳ
        'I',    // Ἴ
        'HI',    // Ἵ
        'I',    // Ἶ
        'HI',    // Ἷ
        'o',    // ὀ
        'ho',    // ὁ
        'o',    // ὂ
        'ho',    // ὃ
        'o',    // ὄ
        'ho',    // ὅ
        'O',    // Ὀ
        'HO',    // Ὁ
        'O',    // Ὂ
        'HO',    // Ὃ
        'O',    // Ὄ
        'HO',    // Ὅ
        'y',    // ὐ
        'hy',    // ὑ
        'y',    // ὒ
        'hy',    // ὓ
        'y',    // ὔ
        'hy',    // ὕ
        'y',    // ὖ
        'hy',    // ὗ
        'HY',    // Ὑ
        'HY',    // Ὓ
        'HY',    // Ὕ
        'HY',    // Ὗ
        'o',    // ὠ
        'ho',    // ὡ
        'o',    // ὢ
        'ho',    // ὣ
        'o',    // ὤ
        'ho',    // ὥ
        'o',    // ὦ
        'ho',    // ὧ
        'O',    // Ὠ
        'HO',    // Ὡ
        'O',    // Ὢ
        'HO',    // Ὣ
        'O',    // Ὤ
        'HO',    // Ὥ
        'O',    // Ὦ
        'HO',    // Ὧ
        'a',    // ὰ
        'a',    // ά
        'e',    // ὲ
        'e',    // έ
        'e',    // ὴ
        'e',    // ή
        'i',    // ὶ
        'i',    // ί
        'o',    // ὸ
        'o',    // ό
        'y',    // ὺ
        'y',    // ύ
        'o',    // ὼ
        'o',    // ώ
        'ai',    // ᾀ
        'hai',    // ᾁ
        'ai',    // ᾂ
        'hai',    // ᾃ
        'ai',    // ᾄ
        'hai',    // ᾅ
        'ai',    // ᾆ
        'hai',    // ᾇ
        'AI',    // ᾈ
        'HAI',    // ᾉ
        'AI',    // ᾊ
        'HAI',    // ᾋ
        'AI',    // ᾌ
        'HAI',    // ᾍ
        'AI',    // ᾎ
        'HAI',    // ᾏ
        'ei',    // ᾐ
        'hei',    // ᾑ
        'ei',    // ᾒ
        'hei',    // ᾓ
        'ei',    // ᾔ
        'hei',    // ᾕ
        'ei',    // ᾖ
        'hei',    // ᾗ
        'EI',    // ᾘ
        'HEI',    // ᾙ
        'EI',    // ᾚ
        'HEI',    // ᾛ
        'EI',    // ᾜ
        'HEI',    // ᾝ
        'EI',    // ᾞ
        'HEI',    // ᾟ
        'oi',    // ᾠ
        'hoi',    // ᾡ
        'oi',    // ᾢ
        'hoi',    // ᾣ
        'oi',    // ᾤ
        'hoi',    // ᾥ
        'oi',    // ᾦ
        'hoi',    // ᾧ
        'OI',    // ᾨ
        'HOI',    // ᾩ
        'OI',    // ᾪ
        'HOI',    // ᾫ
        'OI',    // ᾬ
        'HOI',    // ᾭ
        'OI',    // ᾮ
        'HOI',    // ᾯ
        'a',    // ᾰ
        'a',    // ᾱ
        'ai',    // ᾲ
        'ai',    // ᾳ
        'ai',    // ᾴ
        'a',    // ᾶ
        'ai',    // ᾷ
        'A',    // Ᾰ
        'A',    // Ᾱ
        'A',    // Ὰ
        'A',    // Ά
        'AI',    // ᾼ
        'i',    // ι
        '¨̂',    // ῁
        'ei',    // ῂ
        'ei',    // ῃ
        'ei',    // ῄ
        'e',    // ῆ
        'ei',    // ῇ
        'E',    // Ὲ
        'E',    // Έ
        'E',    // Ὴ
        'E',    // Ή
        'EI',    // ῌ
        '᾿̂',    // ῏
        'i',    // ῐ
        'i',    // ῑ
        'i',    // ῒ
        'i',    // ΐ
        'i',    // ῖ
        'i',    // ῗ
        'I',    // Ῐ
        'I',    // Ῑ
        'I',    // Ὶ
        'I',    // Ί
        '῾̂',    // ῟
        'y',    // ῠ
        'y',    // ῡ
        'y',    // ῢ
        'y',    // ΰ
        'r',    // ῤ
        'rh',    // ῥ
        'y',    // ῦ
        'y',    // ῧ
        'Y',    // Ῠ
        'Y',    // Ῡ
        'Y',    // Ὺ
        'Y',    // Ύ
        'RH',    // Ῥ
        'oi',    // ῲ
        'oi',    // ῳ
        'oi',    // ῴ
        'o',    // ῶ
        'oi',    // ῷ
        'O',    // Ὸ
        'O',    // Ό
        'O',    // Ὼ
        'O',    // Ώ
        'OI',    // ῼ
        ' ',    //  
        ' ',    //  
        ' ',    //  
        ' ',    //  
        ' ',    //  
        ' ',    //  
        ' ',    //  
        ' ',    //  
        ' ',    //  
        ' ',    //  
        '-',    // ‐
        '-',    // ‑
        '-',    // ‒
        '-',    // ―
        '||',    // ‖
        '\'',    // ‛
        '"',    // ‟
        '.',    // ․
        '..',    // ‥
        '\'',    // ′
        '"',    // ″
        '!!',    // ‼
        '/',    // ⁄
        '[',    // ⁅
        ']',    // ⁆
        '??',    // ⁇
        '?!',    // ⁈
        '!?',    // ⁉
        '*',    // ⁎
        ' ',    //  
    );

    /**
     * A basic PHP < 5.4 fallback for transliterator_transliterate
     * @param string $string The string to convert into ASCII
     * @return string The transliterated string
     */
    static function convert($string) {
        return str_replace(self::$fromchars, self::$tochars, $string);
    }          

}

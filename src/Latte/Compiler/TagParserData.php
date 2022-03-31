<?php

/**
 * This file is part of the Latte (https://latte.nette.org)
 * Copyright (c) 2008 David Grudl (https://davidgrudl.com)
 */

declare(strict_types=1);

namespace Latte\Compiler;

use Latte\Compiler\Nodes\Php as Node;
use Latte\Compiler\Nodes\Php\Expression;
use Latte\Compiler\Nodes\Php\Scalar;


/** @internal generated trait used by TagParser */
abstract class TagParserData
{
	/** Symbol number of error recovery token */
	protected const ErrorSymbol = 1;

	/** Action number signifying default action */
	protected const DefaultAction = -8190;

	/** Rule number signifying that an unexpected token was encountered */
	protected const UnexpectedTokenRule = 8191;

	protected const Yy2Tblstate = 248;

	/** Number of non-leaf states */
	protected const NumNonLeafStates = 341;

	/** Map of lexer tokens to internal symbols */
	protected const TokenToSymbol = [
		0,     113,   113,   113,   113,   113,   113,   113,   113,   113,   113,   113,   113,   113,   113,   113,   113,   113,   113,   113,
		113,   113,   113,   113,   113,   113,   113,   113,   113,   113,   113,   113,   113,   48,    108,   113,   109,   47,    113,   113,
		99,    100,   45,    42,    2,     43,    44,    46,    113,   113,   113,   113,   113,   113,   113,   113,   113,   113,   22,    103,
		35,    7,     37,    21,    59,    113,   113,   113,   113,   113,   113,   113,   113,   113,   113,   113,   113,   113,   113,   113,
		113,   113,   113,   113,   113,   113,   113,   113,   113,   113,   113,   61,    113,   107,   27,    113,   113,   98,    113,   113,
		113,   96,    105,   113,   113,   113,   113,   113,   113,   97,    106,   113,   113,   113,   113,   113,   104,   113,   113,   113,
		113,   113,   113,   101,   26,    102,   50,    113,   113,   113,   113,   113,   113,   113,   113,   113,   113,   113,   113,   113,
		113,   113,   113,   113,   113,   113,   113,   113,   113,   113,   113,   113,   113,   113,   113,   113,   113,   113,   113,   113,
		113,   113,   113,   113,   113,   113,   113,   113,   113,   113,   113,   113,   113,   113,   113,   113,   113,   113,   113,   113,
		113,   113,   113,   113,   113,   113,   113,   113,   113,   113,   113,   113,   113,   113,   113,   113,   113,   113,   113,   113,
		113,   113,   113,   113,   113,   113,   113,   113,   113,   113,   113,   113,   113,   113,   113,   113,   113,   113,   113,   113,
		113,   113,   113,   113,   113,   113,   113,   113,   113,   113,   113,   113,   113,   113,   113,   113,   113,   113,   113,   113,
		113,   113,   113,   113,   113,   113,   113,   113,   113,   113,   113,   113,   113,   113,   113,   113,   1,     3,     4,     5,
		6,     8,     9,     10,    11,    12,    13,    14,    15,    16,    17,    18,    19,    20,    23,    24,    25,    28,    29,    30,
		31,    32,    33,    34,    36,    38,    39,    40,    41,    49,    51,    52,    53,    54,    55,    56,    57,    58,    60,    62,
		63,    64,    65,    66,    67,    68,    69,    70,    71,    72,    73,    74,    75,    76,    77,    78,    79,    80,    81,    82,
		83,    84,    85,    86,    87,    88,    89,    90,    110,   91,    92,    93,    94,    95,    111,   112,
	];

	/** Map of states to a displacement into the self::Action table. The corresponding action for this
	 *  state/symbol pair is self::Action[self::ActionBase[$state] + $symbol]. If self::ActionBase[$state] is 0, the
	 *  action is defaulted, i.e. self::ActionDefault[$state] should be used instead. */
	protected const ActionBase = [
		317,   139,   139,   139,   139,   98,    139,   139,   219,   219,   219,   141,   141,   141,   295,   295,   282,   298,   -42,   -42,
		-42,   -42,   -42,   -42,   -42,   -42,   -42,   -42,   -42,   -42,   -42,   -42,   -42,   -42,   -42,   -42,   -42,   -42,   -42,   -42,
		-42,   -42,   -42,   -42,   -42,   -42,   -42,   -42,   -42,   -42,   -42,   -42,   -42,   -42,   -42,   -42,   -42,   -42,   -42,   -42,
		-42,   -42,   -42,   -42,   -42,   -42,   -42,   -42,   -42,   -42,   -42,   -42,   -42,   -42,   -42,   -42,   -42,   -42,   -42,   -42,
		-42,   -42,   -42,   -42,   -42,   -42,   -42,   -42,   -42,   -42,   -42,   -42,   -42,   -42,   -42,   -42,   -42,   -42,   -42,   -42,
		96,    253,   350,   352,   351,   353,   364,   365,   366,   367,   372,   51,    51,    51,    51,    51,    51,    51,    51,    51,
		51,    51,    51,    51,    51,    38,    32,    250,   105,   105,   105,   105,   105,   105,   105,   105,   105,   105,   105,   105,
		105,   105,   105,   105,   105,   105,   388,   388,   388,   205,   355,   347,   225,   -51,   246,   246,   125,   125,   125,   125,
		125,   260,   260,   260,   260,   258,   258,   258,   258,   258,   258,   258,   258,   77,    77,    77,    77,    25,    25,    120,
		112,   112,   112,   274,   274,   274,   245,   101,   39,    39,    39,    39,    39,    -22,   104,   222,   320,   -61,   -61,   -61,
		-61,   -61,   -61,   321,   373,   264,   300,   300,   304,   91,    91,    91,    300,   331,   92,    -41,   197,   316,   323,   311,
		45,    289,   288,   349,   278,   280,   330,   141,   312,   312,   141,   141,   141,   47,    138,   138,   138,   47,    47,    47,
		100,   299,   162,   6,     354,   299,   299,   299,   167,   -74,   334,   306,   334,   334,   68,    102,   71,    334,   334,   334,
		334,   129,   71,    71,    297,   319,   309,   190,   97,    309,   287,   287,   133,   4,     336,   335,   337,   333,   332,   357,
		218,   249,   322,   313,   329,   315,   262,   336,   335,   337,   292,   218,   293,   293,   293,   327,   293,   293,   293,   293,
		293,   293,   293,   310,   63,    326,   338,   339,   343,   344,   359,   294,   360,   293,   307,   345,   325,   324,   369,   218,
		328,   370,   356,   341,   318,   314,   342,   303,   371,   346,   361,   221,   340,   240,   362,   251,   358,   255,   348,   368,
		363,   0,     -42,   -42,   -42,   -42,   -42,   -42,   -42,   -42,   -42,   -42,   -42,   -42,   -42,   -42,   -42,   -42,   -42,   0,
		0,     0,     0,     0,     0,     0,     0,     0,     0,     0,     0,     0,     0,     0,     0,     0,     0,     0,     0,     0,
		0,     0,     0,     0,     0,     0,     0,     0,     0,     0,     0,     0,     0,     0,     0,     0,     0,     0,     0,     0,
		0,     0,     0,     0,     0,     0,     0,     0,     0,     0,     0,     0,     0,     0,     0,     0,     0,     0,     0,     0,
		0,     0,     0,     0,     0,     0,     0,     0,     0,     0,     0,     0,     0,     0,     0,     0,     0,     0,     0,     0,
		0,     51,    51,    51,    51,    51,    51,    51,    51,    51,    51,    51,    0,     0,     0,     0,     0,     0,     0,     0,
		0,     0,     0,     0,     0,     0,     51,    51,    51,    51,    51,    51,    51,    51,    51,    51,    51,    51,    51,    51,
		51,    51,    51,    51,    51,    51,    51,    51,    51,    51,    51,    51,    51,    0,     260,   51,    51,    51,    51,    51,
		51,    51,    0,     0,     0,     0,     39,    39,    39,    39,    39,    39,    39,    39,    91,    91,    91,    91,    39,    39,
		39,    39,    39,    39,    91,    91,    91,    39,    0,     0,     0,     0,     0,     0,     0,     0,     0,     331,   287,   287,
		287,   287,   287,   287,   331,   331,   0,     0,     0,     0,     0,     0,     0,     0,     0,     331,   287,   0,     0,     0,
		0,     0,     0,     0,     141,   141,   141,   331,   0,     287,   287,   0,     0,     0,     0,     0,     0,     0,     0,     0,
		0,     0,     293,   0,     0,     63,    293,   293,   293,
	];

	/** Table of actions. Indexed according to self::ActionBase comment. */
	protected const Action = [
		24,    25,    327,   22,    0,     365,   26,    366,   27,    165,   166,   28,    29,    30,    31,    32,    33,    34,    367,   1,
		180,   35,    535,   536,   193,   615,   514,   367,   500,   616,   533,   274,   164,   230,   231,   -8190, -8190, 275,   276,   -211,
		90,    -8190, 277,   278,   196,   -71,   188,   -71,   279,   8,     89,    516,   515,   517,   44,    45,    46,    19,    279,   -211,
		-211,  -211,  525,   526,   527,   6,     213,   279,   -171,  9,     7,     -71,   17,    10,    47,    48,    49,    -171,  50,    51,
		52,    53,    54,    55,    56,    57,    58,    59,    60,    61,    62,    63,    64,    65,    66,    67,    68,    69,    70,    15,
		182,   348,   349,   347,   91,    512,   483,   514,   -8190, -8190, -8190, 71,    -8191, -8191, -8191, -8191, 62,    63,    64,    65,
		66,    67,    163,   -21,   396,   -45,   346,   345,   -8190, -8190, -8190, 179,   516,   515,   517,   223,   68,    69,    70,    358,
		182,   188,   348,   349,   347,   -71,   -8190, 352,   -8190, -8190, -8190, 71,    -8190, -8190, -8190, -8191, -8191, -8191, -8191, -8191,
		181,   36,    -211,  -8190, 187,   -207,  286,   346,   345,   346,   345,   287,   354,   224,   225,   353,   359,   288,   289,   541,
		358,   367,   -211,  -211,  -211,  -207,  -207,  -207,  352,   88,    -172,  -171,  369,   189,   -207,  190,   195,   -8190, 405,   -172,
		-171,  181,   36,    -214,  365,   187,   366,   286,   -8190, -8190, -8190, 40,    287,   354,   224,   225,   353,   359,   288,   289,
		-28,   279,   348,   349,   347,   85,    -8190, 96,    -8190, -8190, 37,    38,    11,    72,    73,    74,    75,    76,    77,    78,
		79,    80,    81,    82,    83,    84,    97,    346,   345,   -8190, -8190, -8190, -171,  -8190, -8190, -8190, 86,    98,    -210,  12,
		358,   -171,  99,    348,   349,   347,   188,   -8190, 352,   -8190, -8190, -8190, 93,    -8190, -8190, -8190, 446,   448,   -210,  -210,
		-210,  181,   36,    -206,  -22,   187,   -205,  286,   -256,  -253,  -256,  -253,  287,   354,   224,   225,   353,   359,   288,   289,
		-16,   358,   -15,   -206,  -206,  -206,  -205,  -205,  -205,  352,   95,    -250,  -206,  -250,  13,    -205,  65,    66,    67,    1,
		87,    -213,  351,   350,   242,   -208,  362,   367,   363,   94,    533,   186,   161,   355,   354,   357,   356,   353,   359,   360,
		361,   162,   192,   278,   191,   -208,  -208,  -208,  182,   310,   -8190, -8190, -8190, 71,    -208,  92,    367,   39,    -8190, -8190,
		-8190, -205,  525,   526,   527,   21,    213,   279,   -8190, 267,   -8190, -8190, -8190, 617,   -8190, 332,   -8190, 20,    -8190, -8190,
		-8190, -205,  -205,  -205,  215,   200,   201,   202,   -256,  -253,  -205,  -8190, -8190, -8190, 229,   -256,  -253,  197,   198,   199,
		367,   -8190, 604,   -181,  234,   235,   236,   542,   543,   -8190, 377,   -250,  153,   23,    251,   3,     228,   530,   -250,  16,
		168,   279,   0,     -239,  -237,  0,     -214,  -213,  -212,  0,     0,     2,     4,     5,     18,    41,    42,    177,   178,   227,
		0,     264,   266,   488,   531,   407,   406,   0,     503,   -28,   320,   322,   520,   489,   584,   0,     0,     14,    43,    249,
		0,     612,   614,   378,   613,   499,   611,   568,   579,   582,   0,     340,   0,     0,     0,     0,     557,   572,   607,   334,
		0,     534,
	];

	/** Table indexed analogously to self::Action. If self::ActionCheck[self::ActionBase[$state] + $symbol] != $symbol
	 *  then the action is defaulted, i.e. self::ActionDefault[$state] should be used instead. */
	protected const ActionCheck = [
		42,    43,    43,    77,    0,     66,    48,    68,    50,    51,    52,    53,    54,    55,    56,    57,    58,    59,    69,    61,
		62,    63,    64,    65,    66,    66,    68,    69,    102,   70,    72,    73,    26,    75,    76,    3,     4,     79,    80,    61,
		101,   3,     84,    85,    86,    0,     21,    2,     109,   2,     101,   93,    94,    95,    3,     4,     5,     99,    109,   81,
		82,    83,    104,   105,   106,   2,     108,   109,   90,    22,    2,     26,    21,    2,     23,    24,    25,    99,    27,    28,
		29,    30,    31,    32,    33,    34,    35,    36,    37,    38,    39,    40,    41,    42,    43,    44,    45,    46,    47,    2,
		49,    3,     4,     5,     2,     66,    100,   68,    3,     4,     5,     60,    35,    36,    37,    38,    39,    40,    41,    42,
		43,    44,    26,    22,    85,    100,   28,    29,    3,     4,     5,     2,     93,    94,    95,    2,     45,    46,    47,    41,
		49,    21,    3,     4,     5,     100,   21,    49,    23,    24,    25,    60,    27,    28,    29,    30,    31,    32,    33,    34,
		62,    63,    61,    71,    66,    61,    68,    28,    29,    28,    29,    73,    74,    75,    76,    77,    78,    79,    80,    87,
		41,    69,    81,    82,    83,    81,    82,    83,    49,    91,    90,    90,    2,     26,    90,    28,    100,   85,    100,   99,
		99,    62,    63,    99,    66,    66,    68,    68,    3,     4,     5,     99,    73,    74,    75,    76,    77,    78,    79,    80,
		100,   109,   3,     4,     5,     7,     21,    6,     23,    24,    91,    92,    7,     8,     9,     10,    11,    12,    13,    14,
		15,    16,    17,    18,    19,    20,    6,     28,    29,    3,     4,     5,     90,    3,     4,     5,     7,     6,     61,    6,
		41,    99,    7,     3,     4,     5,     21,    21,    49,    23,    24,    25,    22,    27,    28,    29,    51,    52,    81,    82,
		83,    62,    63,    61,    22,    66,    61,    68,    0,     0,     2,     2,     73,    74,    75,    76,    77,    78,    79,    80,
		22,    41,    22,    81,    82,    83,    81,    82,    83,    49,    91,    0,     90,    2,     22,    90,    42,    43,    44,    61,
		22,    99,    62,    63,    66,    61,    66,    69,    68,    22,    72,    22,    26,    73,    74,    75,    76,    77,    78,    79,
		80,    26,    28,    85,    26,    81,    82,    83,    49,    67,    3,     4,     5,     60,    90,    61,    69,    99,    3,     4,
		5,     61,    104,   105,   106,   61,    108,   109,   21,    74,    23,    24,    25,    70,    27,    78,    21,    61,    23,    24,
		25,    81,    82,    83,    61,    81,    82,    83,    100,   100,   90,    3,     4,     5,     90,    107,   107,   81,    82,    83,
		69,    71,    71,    90,    81,    82,    83,    87,    87,    21,    91,    100,   90,    96,    97,    98,    90,    107,   107,   88,
		89,    109,   -1,    99,    99,    -1,    99,    99,    99,    -1,    -1,    99,    99,    99,    99,    99,    99,    99,    99,    99,
		-1,    100,   100,   100,   100,   100,   100,   -1,    100,   100,   100,   100,   100,   100,   100,   -1,    -1,    101,   101,   101,
		-1,    102,   102,   102,   102,   102,   102,   102,   102,   102,   -1,    103,   -1,    -1,    -1,    -1,    107,   107,   107,   107,
		-1,    108,
	];

	/** Map of states to their default action */
	protected const ActionDefault = [
		8191,  248,   248,   30,    248,   8191,  248,   28,    8191,  8191,  28,    8191,  8191,  8191,  38,    28,    8191,  8191,  8191,  8191,
		203,   203,   203,   8191,  8191,  8191,  8191,  8191,  8191,  8191,  8191,  8191,  8191,  8191,  8191,  8191,  9,     8191,  8191,  8191,
		8191,  8191,  8191,  8191,  8191,  8191,  8191,  8191,  8191,  8191,  8191,  8191,  8191,  8191,  8191,  8191,  8191,  8191,  8191,  8191,
		8191,  8191,  8191,  8191,  8191,  8191,  8191,  8191,  8191,  8191,  8191,  8191,  8191,  8191,  8191,  8191,  8191,  8191,  8191,  8191,
		8191,  8191,  8191,  8191,  8191,  8191,  8191,  8191,  67,    8191,  8191,  28,    8191,  8191,  8191,  8191,  8191,  8191,  8191,  8191,
		8191,  249,   8191,  8191,  8191,  8191,  8191,  8191,  8191,  8191,  8191,  1,     257,   258,   76,    70,    204,   252,   255,   72,
		75,    73,    42,    43,    49,    111,   113,   145,   112,   87,    92,    93,    94,    95,    96,    97,    98,    99,    100,   101,
		102,   103,   104,   85,    86,    157,   146,   144,   143,   109,   110,   116,   84,    8191,  114,   115,   133,   134,   131,   132,
		135,   8191,  8191,  8191,  8191,  8191,  8191,  8191,  8191,  8191,  8191,  8191,  8191,  136,   137,   138,   139,   60,    60,    60,
		8191,  10,    8191,  123,   124,   126,   8191,  197,   8191,  8191,  8191,  8191,  8191,  197,   196,   141,   8191,  8191,  8191,  8191,
		8191,  8191,  8191,  8191,  8191,  199,   106,   108,   178,   118,   119,   117,   88,    8191,  8191,  8191,  198,   8191,  265,   205,
		205,   205,   205,   33,    33,    33,    8191,  33,    8191,  8191,  33,    33,    33,    81,    8191,  8191,  8191,  81,    81,    81,
		187,   129,   211,   8191,  8191,  120,   121,   122,   50,    8191,  182,   8191,  170,   8191,  27,    27,    27,    8191,  223,   224,
		225,   27,    27,    27,    161,   35,    62,    27,    27,    62,    8191,  8191,  27,    8191,  8191,  8191,  8191,  8191,  8191,  8191,
		8191,  191,   8191,  209,   221,   2,     173,   14,    19,    20,    8191,  251,   127,   128,   130,   207,   149,   150,   151,   152,
		153,   154,   155,   8191,  244,   177,   8191,  8191,  8191,  8191,  264,   8191,  205,   125,   8191,  8191,  188,   228,   8191,  254,
		206,   8191,  8191,  8191,  52,    53,    8191,  8191,  8191,  8191,  8191,  8191,  8191,  8191,  8191,  8191,  8191,  48,    8191,  8191,
		8191,
	];

	/** Map of non-terminals to a displacement into the self::Goto table. The corresponding goto state for this
	 *  non-terminal/state pair is self::Goto[self::GotoBase[$nonTerminal] + $state] (unless defaulted) */
	protected const GotoBase = [
		0,     0,     -5,    0,     0,     94,    0,     140,   -109,  -38,   -94,   0,     144,   26,    0,     0,     0,     0,     166,   164,
		7,     0,     8,     0,     43,    71,    0,     0,     -68,   -26,   -11,   -7,    0,     154,   24,    0,     0,     -67,   233,   32,
		0,     4,     0,     0,     138,   0,     0,     0,     11,    0,     0,     0,     0,     -65,   -48,   0,     0,     40,    48,    117,
		56,    17,    -50,   0,     0,     -45,   66,    0,     -49,   124,   133,   57,    0,     0,
	];

	/** Table of states to goto after reduction. Indexed according to self::GotoBase comment. */
	protected const Goto = [
		115,   262,   263,   115,   115,   115,   129,   117,   118,   114,   114,   106,   127,   114,   100,   116,   116,   116,   111,   292,
		293,   241,   294,   296,   297,   298,   299,   300,   301,   302,   432,   432,   112,   113,   102,   103,   104,   105,   107,   125,
		126,   128,   146,   149,   150,   151,   154,   155,   156,   157,   158,   159,   160,   173,   174,   175,   176,   183,   184,   185,
		209,   210,   211,   245,   246,   247,   313,   130,   131,   132,   133,   134,   135,   136,   137,   138,   139,   140,   141,   142,
		143,   144,   147,   119,   108,   109,   120,   110,   148,   121,   119,   122,   145,   123,   124,   167,   167,   167,   167,   169,
		167,   167,   169,   169,   169,   170,   171,   172,   317,   395,   395,   395,   511,   511,   511,   305,   305,   305,   395,   309,
		395,   395,   395,   395,   395,   608,   609,   610,   244,   513,   513,   513,   513,   513,   513,   571,   571,   571,   513,   586,
		513,   513,   513,   513,   513,   314,   214,   372,   314,   314,   314,   373,   583,   583,   583,   583,   583,   583,   218,   321,
		339,   415,   329,   226,   410,   218,   218,   385,   424,   423,   421,   418,   419,   335,   380,   218,   218,   618,   504,   576,
		577,   382,   308,   569,   569,   326,   481,   388,   218,   206,   207,   219,   312,   220,   212,   221,   222,   532,   532,   532,
		532,   532,   532,   532,   532,   551,   551,   551,   551,   551,   551,   551,   551,   549,   549,   549,   549,   549,   549,   549,
		549,   295,   295,   295,   295,   295,   295,   295,   295,   404,   204,   0,     337,   507,   291,   291,   291,   291,   505,   291,
		291,   508,   509,   336,   0,     319,   510,   559,   560,   561,   306,   307,   0,     602,   0,     0,     306,   307,   265,   392,
		397,   399,   398,   400,   259,   260,   573,   574,   575,   0,     602,   603,   0,     0,     0,     0,     0,     0,     0,     0,
		0,     0,     0,     603,   0,     0,     0,     0,     0,     0,     0,     0,     0,     316,   0,     0,     0,     0,     0,     0,
		0,     233,   237,   238,   239,
	];

	/** Table indexed analogously to self::Goto. If self::GotoCheck[self::GotoBase[$nonTerminal] + $state] != $nonTerminal
	 *  then the goto state is defaulted, i.e. self::GotoDefault[$nonTerminal] should be used. */
	protected const GotoCheck = [
		2,     31,    31,    2,     2,     2,     2,     2,     2,     2,     2,     2,     2,     2,     2,     2,     2,     2,     2,     2,
		2,     2,     2,     2,     2,     2,     2,     2,     2,     2,     2,     2,     2,     2,     2,     2,     2,     2,     2,     2,
		2,     2,     2,     2,     2,     2,     2,     2,     2,     2,     2,     2,     2,     2,     2,     2,     2,     2,     2,     2,
		2,     2,     2,     2,     2,     2,     2,     2,     2,     2,     2,     2,     2,     2,     2,     2,     2,     2,     2,     2,
		2,     2,     2,     2,     2,     2,     2,     2,     2,     2,     2,     2,     2,     2,     2,     5,     5,     5,     5,     5,
		5,     5,     5,     5,     5,     5,     5,     5,     65,    28,    28,    28,    28,    28,    28,    53,    53,    53,    28,    59,
		28,    28,    28,    28,    28,    8,     8,     8,     69,    54,    54,    54,    54,    54,    54,    65,    65,    65,    54,    70,
		54,    54,    54,    54,    54,    7,     62,    12,    7,     7,     7,     12,    65,    65,    65,    65,    65,    65,    9,     44,
		44,    10,    10,    62,    33,    9,     9,     10,    10,    10,    37,    37,    37,    10,    10,    9,     9,     9,     10,    68,
		68,    18,    19,    65,    65,    20,    41,    22,    9,     34,    34,    34,    34,    34,    34,    34,    34,    39,    39,    39,
		39,    39,    39,    39,    39,    57,    57,    57,    57,    57,    57,    57,    57,    58,    58,    58,    58,    58,    58,    58,
		58,    60,    60,    60,    60,    60,    60,    60,    60,    24,    61,    -1,    9,     9,     38,    38,    38,    38,    48,    38,
		38,    30,    30,    29,    -1,    38,    30,    30,    30,    30,    13,    13,    -1,    71,    -1,    -1,    13,    13,    13,    25,
		25,    25,    25,    25,    66,    66,    66,    66,    66,    -1,    71,    71,    -1,    -1,    -1,    -1,    -1,    -1,    -1,    -1,
		-1,    -1,    -1,    71,    -1,    -1,    -1,    -1,    -1,    -1,    -1,    -1,    -1,    7,     -1,    -1,    -1,    -1,    -1,    -1,
		-1,    7,     7,     7,     7,
	];

	/** Map of non-terminals to the default state to goto after their reduction */
	protected const GotoDefault = [
		-8192, 273,   101,   285,   344,   375,   364,   290,   581,   567,   370,   254,   588,   271,   270,   431,   330,   268,   381,   331,
		323,   261,   387,   232,   402,   248,   324,   325,   252,   333,   524,   256,   315,   409,   152,   255,   243,   420,   280,   281,
		430,   250,   497,   269,   318,   501,   338,   272,   506,   558,   253,   282,   257,   521,   240,   208,   283,   216,   205,   303,
		194,   203,   601,   217,   284,   556,   258,   563,   570,   304,   587,   600,   311,   328,
	];

	/** Map of rules to the non-terminal on their left-hand side, i.e. the non-terminal to use for
	 *  determining the state to goto after reduction. */
	protected const RuleToNonTerminal = [
		0,     1,     1,     1,     5,     5,     6,     6,     6,     6,     6,     6,     6,     6,     6,     6,     6,     6,     6,     6,
		6,     7,     7,     7,     8,     8,     9,     10,    10,    4,     4,     11,    11,    13,    13,    14,    14,    15,    16,    16,
		17,    17,    18,    18,    20,    20,    21,    21,    22,    22,    24,    24,    24,    24,    25,    25,    26,    26,    27,    27,
		23,    23,    29,    29,    30,    30,    30,    32,    31,    31,    33,    33,    33,    33,    19,    35,    35,    36,    36,    3,
		3,     37,    37,    37,    2,     2,     2,     2,     2,     2,     2,     2,     2,     2,     2,     2,     2,     2,     2,     2,
		2,     2,     2,     2,     2,     2,     2,     2,     2,     2,     2,     2,     2,     2,     2,     2,     2,     2,     2,     2,
		2,     2,     2,     2,     2,     2,     2,     2,     2,     2,     2,     2,     2,     2,     2,     2,     2,     2,     2,     2,
		2,     2,     2,     2,     2,     2,     2,     2,     2,     2,     2,     2,     2,     2,     2,     2,     2,     2,     2,     2,
		40,    43,    43,    46,    47,    47,    48,    49,    49,    49,    53,    28,    28,    54,    54,    54,    54,    41,    41,    41,
		51,    51,    45,    45,    57,    57,    57,    57,    58,    39,    60,    60,    60,    60,    42,    42,    42,    42,    42,    42,
		42,    42,    42,    44,    44,    56,    56,    56,    56,    63,    63,    63,    50,    50,    50,    64,    64,    64,    64,    64,
		64,    34,    34,    34,    34,    34,    65,    65,    68,    67,    55,    55,    55,    55,    55,    55,    55,    52,    52,    52,
		66,    66,    66,    38,    59,    69,    69,    70,    70,    12,    12,    12,    12,    12,    12,    12,    12,    12,    12,    61,
		61,    61,    61,    62,    72,    71,    71,    71,    71,    71,    71,    71,    71,    71,    73,    73,    73,    73,
	];

	/** Map of rules to the length of their right-hand side, which is the number of elements that have to
	 *  be popped from the stack(s) on reduction. */
	protected const RuleToLength = [
		1,     2,     2,     2,     1,     1,     1,     1,     1,     1,     1,     1,     1,     1,     1,     1,     1,     1,     1,     1,
		1,     1,     1,     1,     1,     1,     1,     0,     1,     2,     0,     1,     3,     0,     1,     0,     1,     7,     0,     2,
		1,     3,     3,     4,     2,     0,     1,     3,     4,     6,     1,     2,     1,     1,     1,     1,     3,     3,     3,     3,
		0,     1,     0,     2,     2,     4,     3,     1,     1,     3,     1,     2,     2,     3,     2,     3,     1,     4,     4,     3,
		4,     0,     3,     3,     1,     3,     3,     3,     4,     1,     1,     2,     3,     3,     3,     3,     3,     3,     3,     3,
		3,     3,     3,     3,     3,     2,     2,     2,     2,     3,     3,     3,     3,     3,     3,     3,     3,     3,     3,     3,
		3,     3,     3,     3,     3,     3,     3,     2,     2,     2,     2,     3,     3,     3,     3,     3,     3,     3,     3,     3,
		3,     3,     3,     5,     4,     3,     3,     4,     4,     2,     2,     2,     2,     2,     2,     2,     1,     8,     12,    9,
		3,     0,     4,     2,     1,     3,     2,     2,     2,     4,     1,     1,     1,     1,     1,     1,     1,     1,     1,     3,
		1,     1,     0,     1,     1,     1,     1,     1,     3,     3,     4,     1,     1,     3,     1,     1,     1,     1,     1,     1,
		3,     2,     3,     0,     1,     1,     3,     1,     1,     1,     1,     1,     1,     3,     1,     1,     4,     1,     4,     4,
		4,     1,     1,     3,     3,     3,     1,     4,     1,     3,     1,     4,     3,     3,     3,     3,     3,     1,     3,     1,
		1,     3,     1,     4,     1,     3,     1,     1,     0,     1,     2,     1,     3,     4,     3,     3,     4,     2,     2,     2,
		2,     1,     2,     1,     1,     1,     4,     3,     3,     3,     3,     3,     6,     3,     1,     1,     2,     1,
	];

	/** Map of symbols to their names */
	protected const SymbolToName = [
		'end',
		'error',
		"','",
		"'or'",
		"'xor'",
		"'and'",
		"'=>'",
		"'='",
		"'+='",
		"'-='",
		"'*='",
		"'/='",
		"'.='",
		"'%='",
		"'&='",
		"'|='",
		"'^='",
		"'<<='",
		"'>>='",
		"'**='",
		"'??='",
		"'?'",
		"':'",
		"'??'",
		"'||'",
		"'&&'",
		"'|'",
		"'^'",
		"'&'",
		"'&'",
		"'=='",
		"'!='",
		"'==='",
		"'!=='",
		"'<=>'",
		"'<'",
		"'<='",
		"'>'",
		"'>='",
		"'<<'",
		"'>>'",
		"'in'",
		"'+'",
		"'-'",
		"'.'",
		"'*'",
		"'/'",
		"'%'",
		"'!'",
		"'instanceof'",
		"'~'",
		"'++'",
		"'--'",
		"'(int)'",
		"'(float'",
		"'(string)'",
		"'(array)'",
		"'(object)'",
		"'(bool)'",
		"'@'",
		"'**'",
		"'['",
		"'new'",
		"'clone'",
		'integer',
		'floating-point number',
		'identifier',
		'variable name',
		'constant',
		'variable',
		'number',
		'string content',
		'quoted string',
		"'match'",
		"'default'",
		"'function'",
		"'fn'",
		"'return'",
		"'use'",
		"'isset'",
		"'empty'",
		"'->'",
		"'?->'",
		"'??->'",
		"'list'",
		"'array'",
		'heredoc start',
		'heredoc end',
		"'\${'",
		"'{\$'",
		"'::'",
		"'...'",
		"'(expand)'",
		'fully qualified name',
		'namespaced name',
		'namespace-relative name',
		"'e'",
		"'m'",
		"'a'",
		"'('",
		"')'",
		"'{'",
		"'}'",
		"';'",
		"'true'",
		"'false'",
		"'null'",
		"']'",
		"'\"'",
		"'$'",
		"'\\\\'",
		'whitespace',
		'comment',
	];

	/** Temporary value containing the result of last semantic action (reduction) */
	protected mixed $semValue = null;

	/** Semantic value stack (contains values of tokens and semantic action results) */
	protected array $semStack;

	/** @var Token[] Start attribute stack */
	protected array $startTokenStack;


	protected function reduce(int $rule, int $pos): void
	{
		(match ($rule) {
			0, 1, 2, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 27, 28, 50, 61, 63, 84, 89, 90, 156, 170, 172, 177, 178, 180, 181, 183, 191, 196, 198, 199, 204, 205, 207, 208, 209, 210, 212, 214, 215, 217, 221, 222, 226, 230, 237, 239, 240, 242, 247, 265, 277 => fn() => $this->semValue = $this->semStack[$pos],
			3 => fn() => $this->semValue = new Expression\ArrayNode($this->semStack[$pos]),
			21, 22, 23, 24, 25 => fn() => $this->semValue = new Node\IdentifierNode($this->semStack[$pos], $this->startTokenStack[$pos]->line),
			26 => fn() => $this->semValue = new Expression\VariableNode(substr($this->semStack[$pos], 1), $this->startTokenStack[$pos]->line),
			29, 39, 44, 74, 82, 83, 141, 142, 162, 163, 179, 206, 213, 238, 241, 273 => fn() => $this->semValue = $this->semStack[$pos - 1],
			30, 38, 45, 64, 81, 161, 182 => fn() => $this->semValue = [],
			31, 40, 46, 68, 76, 164, 246, 261 => fn() => $this->semValue = [$this->semStack[$pos]],
			32, 41, 47, 57, 59, 69, 75, 165, 245 => function () use ($pos) {
				$this->semStack[$pos - 2][] = $this->semStack[$pos];
				$this->semValue = $this->semStack[$pos - 2];
			},
			33, 35 => fn() => $this->semValue = false,
			34, 36 => fn() => $this->semValue = true,
			37 => fn() => $this->semValue = new Expression\MatchNode($this->semStack[$pos - 4], $this->semStack[$pos - 1], $this->startTokenStack[$pos - 6]->line),
			42 => fn() => $this->semValue = new Node\MatchArmNode($this->semStack[$pos - 2], $this->semStack[$pos], $this->startTokenStack[$pos - 2]->line),
			43 => fn() => $this->semValue = new Node\MatchArmNode(null, $this->semStack[$pos], $this->startTokenStack[$pos - 3]->line),
			48 => fn() => $this->semValue = new Node\ParameterNode($this->semStack[$pos], null, $this->semStack[$pos - 3], $this->semStack[$pos - 2], $this->semStack[$pos - 1], $this->startTokenStack[$pos - 3]->line),
			49 => fn() => $this->semValue = new Node\ParameterNode($this->semStack[$pos - 2], $this->semStack[$pos], $this->semStack[$pos - 5], $this->semStack[$pos - 4], $this->semStack[$pos - 3], $this->startTokenStack[$pos - 5]->line),
			51 => fn() => $this->semValue = new Node\NullableTypeNode($this->semStack[$pos], $this->startTokenStack[$pos - 1]->line),
			52 => fn() => $this->semValue = new Node\UnionTypeNode($this->semStack[$pos], $this->startTokenStack[$pos]->line),
			53 => fn() => $this->semValue = new Node\IntersectionTypeNode($this->semStack[$pos], $this->startTokenStack[$pos]->line),
			54 => fn() => $this->semValue = $this->handleBuiltinTypes($this->semStack[$pos]),
			55 => fn() => $this->semValue = new Node\IdentifierNode('array', $this->startTokenStack[$pos]->line),
			56, 58 => fn() => $this->semValue = [$this->semStack[$pos - 2], $this->semStack[$pos]],
			60, 62, 203, 248 => fn() => $this->semValue = null,
			65 => fn() => $this->semValue = $this->semStack[$pos - 2],
			66 => fn() => $this->semValue = [$this->semStack[$pos - 1]],
			67 => fn() => $this->semValue = new Node\VariadicPlaceholderNode($this->startTokenStack[$pos]->line),
			70 => fn() => $this->semValue = new Node\ArgumentNode($this->semStack[$pos], false, false, $this->startTokenStack[$pos]->line),
			71 => fn() => $this->semValue = new Node\ArgumentNode($this->semStack[$pos], true, false, $this->startTokenStack[$pos - 1]->line),
			72 => fn() => $this->semValue = new Node\ArgumentNode($this->semStack[$pos], false, true, $this->startTokenStack[$pos - 1]->line),
			73 => fn() => $this->semValue = new Node\ArgumentNode($this->semStack[$pos], false, false, $this->startTokenStack[$pos - 2]->line, $this->semStack[$pos - 2]),
			77, 78, 80 => fn() => $this->semValue = new Expression\FilterNode($this->semStack[$pos - 3], $this->semStack[$pos - 1], $this->semStack[$pos], $this->startTokenStack[$pos - 3]->line),
			79 => fn() => $this->semValue = new Expression\FilterNode(null, $this->semStack[$pos - 1], $this->semStack[$pos], $this->startTokenStack[$pos - 2]->line),
			85, 86, 87 => fn() => $this->semValue = new Expression\AssignNode($this->semStack[$pos - 2], $this->semStack[$pos], false, $this->startTokenStack[$pos - 2]->line),
			88 => fn() => $this->semValue = new Expression\AssignNode($this->semStack[$pos - 3], $this->semStack[$pos], true, $this->startTokenStack[$pos - 3]->line),
			91 => fn() => $this->semValue = new Expression\CloneNode($this->semStack[$pos], $this->startTokenStack[$pos - 1]->line),
			92 => fn() => $this->semValue = new Expression\AssignOpNode($this->semStack[$pos - 2], '+', $this->semStack[$pos], $this->startTokenStack[$pos - 2]->line),
			93 => fn() => $this->semValue = new Expression\AssignOpNode($this->semStack[$pos - 2], '-', $this->semStack[$pos], $this->startTokenStack[$pos - 2]->line),
			94 => fn() => $this->semValue = new Expression\AssignOpNode($this->semStack[$pos - 2], '*', $this->semStack[$pos], $this->startTokenStack[$pos - 2]->line),
			95 => fn() => $this->semValue = new Expression\AssignOpNode($this->semStack[$pos - 2], '/', $this->semStack[$pos], $this->startTokenStack[$pos - 2]->line),
			96 => fn() => $this->semValue = new Expression\AssignOpNode($this->semStack[$pos - 2], '.', $this->semStack[$pos], $this->startTokenStack[$pos - 2]->line),
			97 => fn() => $this->semValue = new Expression\AssignOpNode($this->semStack[$pos - 2], '%', $this->semStack[$pos], $this->startTokenStack[$pos - 2]->line),
			98 => fn() => $this->semValue = new Expression\AssignOpNode($this->semStack[$pos - 2], '&', $this->semStack[$pos], $this->startTokenStack[$pos - 2]->line),
			99 => fn() => $this->semValue = new Expression\AssignOpNode($this->semStack[$pos - 2], '|', $this->semStack[$pos], $this->startTokenStack[$pos - 2]->line),
			100 => fn() => $this->semValue = new Expression\AssignOpNode($this->semStack[$pos - 2], '^', $this->semStack[$pos], $this->startTokenStack[$pos - 2]->line),
			101 => fn() => $this->semValue = new Expression\AssignOpNode($this->semStack[$pos - 2], '<<', $this->semStack[$pos], $this->startTokenStack[$pos - 2]->line),
			102 => fn() => $this->semValue = new Expression\AssignOpNode($this->semStack[$pos - 2], '>>', $this->semStack[$pos], $this->startTokenStack[$pos - 2]->line),
			103 => fn() => $this->semValue = new Expression\AssignOpNode($this->semStack[$pos - 2], '**', $this->semStack[$pos], $this->startTokenStack[$pos - 2]->line),
			104 => fn() => $this->semValue = new Expression\AssignOpNode($this->semStack[$pos - 2], '??', $this->semStack[$pos], $this->startTokenStack[$pos - 2]->line),
			105 => fn() => $this->semValue = new Expression\PostOpNode($this->semStack[$pos - 1], '++', $this->startTokenStack[$pos - 1]->line),
			106 => fn() => $this->semValue = new Expression\PreOpNode($this->semStack[$pos], '++', $this->startTokenStack[$pos - 1]->line),
			107 => fn() => $this->semValue = new Expression\PostOpNode($this->semStack[$pos - 1], '--', $this->startTokenStack[$pos - 1]->line),
			108 => fn() => $this->semValue = new Expression\PreOpNode($this->semStack[$pos], '--', $this->startTokenStack[$pos - 1]->line),
			109 => fn() => $this->semValue = new Expression\BinaryOpNode($this->semStack[$pos - 2], '||', $this->semStack[$pos], $this->startTokenStack[$pos - 2]->line),
			110 => fn() => $this->semValue = new Expression\BinaryOpNode($this->semStack[$pos - 2], '&&', $this->semStack[$pos], $this->startTokenStack[$pos - 2]->line),
			111 => fn() => $this->semValue = new Expression\BinaryOpNode($this->semStack[$pos - 2], 'or', $this->semStack[$pos], $this->startTokenStack[$pos - 2]->line),
			112 => fn() => $this->semValue = new Expression\BinaryOpNode($this->semStack[$pos - 2], 'and', $this->semStack[$pos], $this->startTokenStack[$pos - 2]->line),
			113 => fn() => $this->semValue = new Expression\BinaryOpNode($this->semStack[$pos - 2], 'xor', $this->semStack[$pos], $this->startTokenStack[$pos - 2]->line),
			114, 115 => fn() => $this->semValue = new Expression\BinaryOpNode($this->semStack[$pos - 2], '&', $this->semStack[$pos], $this->startTokenStack[$pos - 2]->line),
			116 => fn() => $this->semValue = new Expression\BinaryOpNode($this->semStack[$pos - 2], '^', $this->semStack[$pos], $this->startTokenStack[$pos - 2]->line),
			117 => fn() => $this->semValue = new Expression\BinaryOpNode($this->semStack[$pos - 2], '.', $this->semStack[$pos], $this->startTokenStack[$pos - 2]->line),
			118 => fn() => $this->semValue = new Expression\BinaryOpNode($this->semStack[$pos - 2], '+', $this->semStack[$pos], $this->startTokenStack[$pos - 2]->line),
			119 => fn() => $this->semValue = new Expression\BinaryOpNode($this->semStack[$pos - 2], '-', $this->semStack[$pos], $this->startTokenStack[$pos - 2]->line),
			120 => fn() => $this->semValue = new Expression\BinaryOpNode($this->semStack[$pos - 2], '*', $this->semStack[$pos], $this->startTokenStack[$pos - 2]->line),
			121 => fn() => $this->semValue = new Expression\BinaryOpNode($this->semStack[$pos - 2], '/', $this->semStack[$pos], $this->startTokenStack[$pos - 2]->line),
			122 => fn() => $this->semValue = new Expression\BinaryOpNode($this->semStack[$pos - 2], '%', $this->semStack[$pos], $this->startTokenStack[$pos - 2]->line),
			123 => fn() => $this->semValue = new Expression\BinaryOpNode($this->semStack[$pos - 2], '<<', $this->semStack[$pos], $this->startTokenStack[$pos - 2]->line),
			124 => fn() => $this->semValue = new Expression\BinaryOpNode($this->semStack[$pos - 2], '>>', $this->semStack[$pos], $this->startTokenStack[$pos - 2]->line),
			125 => fn() => $this->semValue = new Expression\BinaryOpNode($this->semStack[$pos - 2], '**', $this->semStack[$pos], $this->startTokenStack[$pos - 2]->line),
			126 => fn() => $this->semValue = new Expression\InRangeNode($this->semStack[$pos - 2], $this->semStack[$pos], $this->startTokenStack[$pos - 2]->line),
			127 => fn() => $this->semValue = new Expression\UnaryOpNode($this->semStack[$pos], '+', $this->startTokenStack[$pos - 1]->line),
			128 => fn() => $this->semValue = new Expression\UnaryOpNode($this->semStack[$pos], '-', $this->startTokenStack[$pos - 1]->line),
			129 => fn() => $this->semValue = new Expression\NotNode($this->semStack[$pos], $this->startTokenStack[$pos - 1]->line),
			130 => fn() => $this->semValue = new Expression\UnaryOpNode($this->semStack[$pos], '~', $this->startTokenStack[$pos - 1]->line),
			131 => fn() => $this->semValue = new Expression\BinaryOpNode($this->semStack[$pos - 2], '===', $this->semStack[$pos], $this->startTokenStack[$pos - 2]->line),
			132, 134 => fn() => $this->semValue = new Expression\BinaryOpNode($this->semStack[$pos - 2], '!==', $this->semStack[$pos], $this->startTokenStack[$pos - 2]->line),
			133 => fn() => $this->semValue = new Expression\BinaryOpNode($this->semStack[$pos - 2], '==', $this->semStack[$pos], $this->startTokenStack[$pos - 2]->line),
			135 => fn() => $this->semValue = new Expression\BinaryOpNode($this->semStack[$pos - 2], '<=>', $this->semStack[$pos], $this->startTokenStack[$pos - 2]->line),
			136 => fn() => $this->semValue = new Expression\BinaryOpNode($this->semStack[$pos - 2], '<', $this->semStack[$pos], $this->startTokenStack[$pos - 2]->line),
			137 => fn() => $this->semValue = new Expression\BinaryOpNode($this->semStack[$pos - 2], '<=', $this->semStack[$pos], $this->startTokenStack[$pos - 2]->line),
			138 => fn() => $this->semValue = new Expression\BinaryOpNode($this->semStack[$pos - 2], '>', $this->semStack[$pos], $this->startTokenStack[$pos - 2]->line),
			139 => fn() => $this->semValue = new Expression\BinaryOpNode($this->semStack[$pos - 2], '>=', $this->semStack[$pos], $this->startTokenStack[$pos - 2]->line),
			140 => fn() => $this->semValue = new Expression\InstanceofNode($this->semStack[$pos - 2], $this->semStack[$pos], $this->startTokenStack[$pos - 2]->line),
			143 => fn() => $this->semValue = new Expression\TernaryNode($this->semStack[$pos - 4], $this->semStack[$pos - 2], $this->semStack[$pos], $this->startTokenStack[$pos - 4]->line),
			144 => fn() => $this->semValue = new Expression\TernaryNode($this->semStack[$pos - 3], null, $this->semStack[$pos], $this->startTokenStack[$pos - 3]->line),
			145 => fn() => $this->semValue = new Expression\TernaryNode($this->semStack[$pos - 2], $this->semStack[$pos], null, $this->startTokenStack[$pos - 2]->line),
			146 => fn() => $this->semValue = new Expression\BinaryOpNode($this->semStack[$pos - 2], '??', $this->semStack[$pos], $this->startTokenStack[$pos - 2]->line),
			147 => fn() => $this->semValue = new Expression\IssetNode($this->semStack[$pos - 1], $this->startTokenStack[$pos - 3]->line),
			148 => fn() => $this->semValue = new Expression\EmptyNode($this->semStack[$pos - 1], $this->startTokenStack[$pos - 3]->line),
			149 => fn() => $this->semValue = new Expression\CastNode('int', $this->semStack[$pos], $this->startTokenStack[$pos - 1]->line),
			150 => fn() => $this->semValue = new Expression\CastNode('float', $this->semStack[$pos], $this->startTokenStack[$pos - 1]->line),
			151 => fn() => $this->semValue = new Expression\CastNode('string', $this->semStack[$pos], $this->startTokenStack[$pos - 1]->line),
			152 => fn() => $this->semValue = new Expression\CastNode('array', $this->semStack[$pos], $this->startTokenStack[$pos - 1]->line),
			153 => fn() => $this->semValue = new Expression\CastNode('object', $this->semStack[$pos], $this->startTokenStack[$pos - 1]->line),
			154 => fn() => $this->semValue = new Expression\CastNode('bool', $this->semStack[$pos], $this->startTokenStack[$pos - 1]->line),
			155 => fn() => $this->semValue = new Expression\ErrorSuppressNode($this->semStack[$pos], $this->startTokenStack[$pos - 1]->line),
			157 => fn() => $this->semValue = new Expression\ClosureNode((bool) $this->semStack[$pos - 6], $this->semStack[$pos - 4], [], $this->semStack[$pos - 2], $this->semStack[$pos], $this->startTokenStack[$pos - 7]->line),
			158 => fn() => $this->semValue = new Expression\ClosureNode((bool) $this->semStack[$pos - 10], $this->semStack[$pos - 8], $this->semStack[$pos - 6], $this->semStack[$pos - 5], $this->semStack[$pos - 2], $this->startTokenStack[$pos - 11]->line),
			159 => fn() => $this->semValue = new Expression\ClosureNode((bool) $this->semStack[$pos - 7], $this->semStack[$pos - 5], $this->semStack[$pos - 3], $this->semStack[$pos - 2], null, $this->startTokenStack[$pos - 8]->line),
			160 => fn() => $this->semValue = new Expression\NewNode($this->semStack[$pos - 1], $this->semStack[$pos], $this->startTokenStack[$pos - 2]->line),
			166 => fn() => $this->semValue = new Expression\ClosureUseNode($this->semStack[$pos], $this->semStack[$pos - 1], $this->startTokenStack[$pos - 1]->line),
			167, 168 => fn() => $this->semValue = new Expression\FunctionCallNode($this->semStack[$pos - 1], $this->semStack[$pos], $this->startTokenStack[$pos - 1]->line),
			169 => fn() => $this->semValue = new Expression\StaticCallNode($this->semStack[$pos - 3], $this->semStack[$pos - 1], $this->semStack[$pos], $this->startTokenStack[$pos - 3]->line),
			171, 173, 174 => fn() => $this->semValue = new Node\NameNode($this->semStack[$pos], $this->startTokenStack[$pos]->line),
			175 => fn() => $this->semValue = new Node\FullyQualifiedNameNode(substr($this->semStack[$pos], 1), $this->startTokenStack[$pos]->line),
			176 => fn() => $this->semValue = new Node\RelativeNameNode(substr($this->semStack[$pos], 10), $this->startTokenStack[$pos]->line),
			184 => fn() => $this->semValue = new Scalar\BooleanNode(true, $this->startTokenStack[$pos]->line),
			185 => fn() => $this->semValue = new Scalar\BooleanNode(false, $this->startTokenStack[$pos]->line),
			186 => fn() => $this->semValue = new Scalar\NullNode($this->startTokenStack[$pos]->line),
			187 => fn() => $this->semValue = new Expression\ConstantFetchNode($this->semStack[$pos], $this->startTokenStack[$pos]->line),
			188 => fn() => $this->semValue = new Expression\ClassConstantFetchNode($this->semStack[$pos - 2], $this->semStack[$pos], $this->startTokenStack[$pos - 2]->line),
			189, 190 => fn() => $this->semValue = new Expression\ArrayNode($this->semStack[$pos - 1]),
			192 => fn() => $this->semValue = Scalar\StringNode::parse($this->semStack[$pos], $this->startTokenStack[$pos]->line),
			193 => fn() => $this->semValue = Scalar\EncapsedStringNode::parse($this->semStack[$pos - 1], $this->startTokenStack[$pos - 2]->line),
			194 => fn() => $this->semValue = Scalar\IntegerNode::parse($this->semStack[$pos], $this->startTokenStack[$pos]->line),
			195 => fn() => $this->semValue = Scalar\FloatNode::parse($this->semStack[$pos], $this->startTokenStack[$pos]->line),
			197, 274 => fn() => $this->semValue = new Scalar\StringNode($this->semStack[$pos], $this->startTokenStack[$pos]->line),
			200 => fn() => $this->semValue = $this->parseDocString($this->semStack[$pos - 2], [$this->semStack[$pos - 1]], $this->semStack[$pos], $this->startTokenStack[$pos - 2]->line, $this->startTokenStack[$pos]->line),
			201 => fn() => $this->semValue = $this->parseDocString($this->semStack[$pos - 1], [], $this->semStack[$pos], $this->startTokenStack[$pos - 1]->line, $this->startTokenStack[$pos]->line),
			202 => fn() => $this->semValue = $this->parseDocString($this->semStack[$pos - 2], $this->semStack[$pos - 1], $this->semStack[$pos], $this->startTokenStack[$pos - 2]->line, $this->startTokenStack[$pos]->line),
			211 => fn() => $this->semValue = new Expression\ConstantFetchNode(new Node\NameNode($this->semStack[$pos], $this->startTokenStack[$pos]->line), $this->startTokenStack[$pos]->line),
			216, 231, 266 => fn() => $this->semValue = new Expression\ArrayAccessNode($this->semStack[$pos - 3], $this->semStack[$pos - 1], $this->startTokenStack[$pos - 3]->line),
			218 => fn() => $this->semValue = new Expression\MethodCallNode($this->semStack[$pos - 3], $this->semStack[$pos - 1], $this->semStack[$pos], $this->startTokenStack[$pos - 3]->line),
			219 => fn() => $this->semValue = new Expression\NullsafeMethodCallNode($this->semStack[$pos - 3], $this->semStack[$pos - 1], $this->semStack[$pos], $this->startTokenStack[$pos - 3]->line),
			220 => fn() => $this->semValue = new Expression\UndefinedsafeMethodCallNode($this->semStack[$pos - 3], $this->semStack[$pos - 1], $this->semStack[$pos], $this->startTokenStack[$pos - 3]->line),
			223, 232, 267 => fn() => $this->semValue = new Expression\PropertyFetchNode($this->semStack[$pos - 2], $this->semStack[$pos], $this->startTokenStack[$pos - 2]->line),
			224, 233, 268 => fn() => $this->semValue = new Expression\NullsafePropertyFetchNode($this->semStack[$pos - 2], $this->semStack[$pos], $this->startTokenStack[$pos - 2]->line),
			225, 234, 269 => fn() => $this->semValue = new Expression\UndefinedsafePropertyFetchNode($this->semStack[$pos - 2], $this->semStack[$pos], $this->startTokenStack[$pos - 2]->line),
			227 => fn() => $this->semValue = new Expression\VariableNode($this->semStack[$pos - 1], $this->startTokenStack[$pos - 3]->line),
			228 => function () use ($pos) {
				$var = $this->semStack[$pos]->name;
				$this->semValue = \is_string($var)
					? new Node\VarLikeIdentifierNode($var, $this->startTokenStack[$pos]->line)
					: $var;
			},
			229, 235, 236 => fn() => $this->semValue = new Expression\StaticPropertyFetchNode($this->semStack[$pos - 2], $this->semStack[$pos], $this->startTokenStack[$pos - 2]->line),
			243 => fn() => $this->semValue = new Expression\ListNode($this->semStack[$pos - 1], $this->startTokenStack[$pos - 3]->line),
			244 => function () use ($pos) {
				$this->semValue = $this->semStack[$pos];
				$end = count($this->semValue) - 1;
				if ($this->semValue[$end] === null) {
					array_pop($this->semValue);
				}
			},
			249, 251 => fn() => $this->semValue = new Expression\ArrayItemNode($this->semStack[$pos], null, false, $this->startTokenStack[$pos]->line),
			250 => fn() => $this->semValue = new Expression\ArrayItemNode($this->semStack[$pos], null, true, $this->startTokenStack[$pos - 1]->line),
			252, 254, 255 => fn() => $this->semValue = new Expression\ArrayItemNode($this->semStack[$pos], $this->semStack[$pos - 2], false, $this->startTokenStack[$pos - 2]->line),
			253, 256 => fn() => $this->semValue = new Expression\ArrayItemNode($this->semStack[$pos], $this->semStack[$pos - 3], true, $this->startTokenStack[$pos - 3]->line),
			257, 258 => fn() => $this->semValue = new Expression\ArrayItemNode($this->semStack[$pos], null, false, $this->startTokenStack[$pos - 1]->line, true, $this->startTokenStack[$pos - 1]->line),
			259, 260 => function () use ($pos) {
				$this->semStack[$pos - 1][] = $this->semStack[$pos];
				$this->semValue = $this->semStack[$pos - 1];
			},
			262 => fn() => $this->semValue = [$this->semStack[$pos - 1], $this->semStack[$pos]],
			263 => fn() => $this->semValue = new Scalar\EncapsedStringPartNode($this->semStack[$pos], $this->startTokenStack[$pos]->line),
			264 => fn() => $this->semValue = new Expression\VariableNode($this->semStack[$pos], $this->startTokenStack[$pos]->line),
			270, 271 => fn() => $this->semValue = new Expression\VariableNode($this->semStack[$pos - 1], $this->startTokenStack[$pos - 2]->line),
			272 => fn() => $this->semValue = new Expression\ArrayAccessNode($this->semStack[$pos - 4], $this->semStack[$pos - 2], $this->startTokenStack[$pos - 5]->line),
			275 => fn() => $this->semValue = $this->parseOffset($this->semStack[$pos], $this->startTokenStack[$pos]->line),
			276 => fn() => $this->semValue = $this->parseOffset('-' . $this->semStack[$pos], $this->startTokenStack[$pos - 1]->line),
		})();
	}
}

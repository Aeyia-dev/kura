# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Commands
- **Run all tests**: `php artisan test`
- **Run a single test**: `php artisan test --filter test_name`
- **Style linting**: `./vendor/bin/pint`
- **Dev server**: `php artisan serve`
- **Start full environment**: `composer dev`
- **Frontend dev**: `npm run dev`
- **Build assets**: `npm run build`

## Code Style
- **PHP**: PSR-12 compliant with Laravel rules (via Pint)
- **Indentation**: 4 spaces for PHP
- **String quotes**: Single quotes preferred
- **Classes**: PascalCase
- **Methods/Properties**: camelCase
- **Return types**: Required (no space before colon)
- **Imports**: Sorted alphabetically (constants, classes, functions)
- **Error handling**: Use Laravel's exception handler
- **Testing**: PHPUnit with Feature/Unit test separation
- **Documentation**: PHPDoc blocks with required tags (param, return, throws)
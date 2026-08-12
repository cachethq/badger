# Changelog

All notable changes to `cachethq/badger` will be documented in this file.

## v5.0.0 - 2026-08-12

### Added

* Support for Laravel 12 and 13 in https://github.com/cachethq/badger/pull/5
* New `for-the-badge` badge style, modeled on shields.io in https://github.com/cachethq/badger/pull/5
* Automated releases: pushing a `v*` tag now publishes a GitHub release and updates the changelog in https://github.com/cachethq/badger/pull/5

### Changed

* Now requires PHP 8.2+. For Laravel 8–10, use the [4.x](https://github.com/cachethq/badger/tree/4.x) branch
* Test suite upgraded to Pest 3/4 and Testbench 10/11
* Implicitly nullable parameters made explicit for PHP 8.4+ compatibility

**Full Changelog**: https://github.com/cachethq/badger/compare/v3.0.0...v5.0.0

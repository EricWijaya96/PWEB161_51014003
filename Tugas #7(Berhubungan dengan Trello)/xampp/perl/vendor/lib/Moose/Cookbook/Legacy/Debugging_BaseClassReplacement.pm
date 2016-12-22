package Moose::Cookbook::Legacy::Debugging_BaseClassReplacement;
BEGIN {
  $Moose::Cookbook::Legacy::Debugging_BaseClassReplacement::AUTHORITY = 'cpan:STEVAN';
}
{
  $Moose::Cookbook::Legacy::Debugging_BaseClassReplacement::VERSION = '2.0603';
}

# ABSTRACT: Providing an alternate base object class







=pod

=head1 NAME

Moose::Cookbook::Legacy::Debugging_BaseClassReplacement - Providing an alternate base object class

=head1 VERSION

version 2.0603

=head1 SYNOPSIS

  package MyApp::Base;
  use Moose;

  extends 'Moose::Object';

  before 'new' => sub { warn "Making a new " . $_[0] };

  no Moose;

  package MyApp::UseMyBase;
  use Moose ();
  use Moose::Exporter;

  Moose::Exporter->setup_import_methods( also => 'Moose' );

  sub init_meta {
      shift;
      return Moose->init_meta( @_, base_class => 'MyApp::Base' );
  }

=head1 DESCRIPTION

B<WARNING: Replacing the base class entirely, as opposed to applying roles to
the base class, is strongly discouraged. This recipe is provided solely for
reference when encountering older code that does this.>

A common extension is to provide an alternate base class. One way to
do that is to make a C<MyApp::Base> and add C<S<extends
'MyApp::Base'>> to every class in your application. That's pretty
tedious. Instead, you can create a Moose-alike module that sets the
base object class to C<MyApp::Base> for you.

Then, instead of writing C<S<use Moose>> you can write C<S<use
MyApp::UseMyBase>>.

In this particular example, our base class issues some debugging
output every time a new object is created, but you can think of some
more interesting things to do with your own base class.

This uses the magic of L<Moose::Exporter>. When we call C<<
Moose::Exporter->setup_import_methods( also => 'Moose' ) >> it builds
C<import> and C<unimport> methods for you. The C<< also => 'Moose' >>
bit says that we want to export everything that Moose does.

The C<import> method that gets created will call our C<init_meta>
method, passing it C<< for_caller => $caller >> as its
arguments. The C<$caller> is set to the class that actually imported
us in the first place.

See the L<Moose::Exporter> docs for more details on its API.

=head1 NAME

Moose::Cookbook::Extending::Recipe3 - Providing an alternate base object class

=head1 VERSION

version 2.0402

=for testing-SETUP use Test::Requires {
    'Test::Output' => '0',
};

=head1 USING MyApp::UseMyBase

To actually use our new base class, we simply use C<MyApp::UseMyBase>
I<instead> of C<Moose>. We get all the Moose sugar plus our new base
class.

  package Foo;

  use MyApp::UseMyBase;

  has 'size' => ( is => 'rw' );

  no MyApp::UseMyBase;

=head1 CONCLUSION

This is an awful lot of magic for a simple base class. You will often
want to combine a metaclass trait with a base class extension, and
that's when this technique is useful.

=begin testing

{
    package Foo;

    MyApp::UseMyBase->import;

    has( 'size' => ( is => 'rw' ) );
}

ok( Foo->isa('MyApp::Base'), 'Foo isa MyApp::Base' );

ok( Foo->can('size'), 'Foo has a size method' );

my $foo;
stderr_like(
    sub { $foo = Foo->new( size => 2 ) },
    qr/^Making a new Foo/,
    'got expected warning when calling Foo->new'
);

is( $foo->size(), 2, '$foo->size is 2' );

=end testing

=head1 AUTHOR

Moose is maintained by the Moose Cabal, along with the help of many contributors. See L<Moose/CABAL> and L<Moose/CONTRIBUTORS> for details.

=head1 COPYRIGHT AND LICENSE

This software is copyright (c) 2012 by Infinity Interactive, Inc..

This is free software; you can redistribute it and/or modify it under
the same terms as the Perl 5 programming language system itself.

=head1 AUTHOR

Moose is maintained by the Moose Cabal, along with the help of many contributors. See L<Moose/CABAL> and L<Moose/CONTRIBUTORS> for details.

=head1 COPYRIGHT AND LICENSE

This software is copyright (c) 2012 by Infinity Interactive, Inc..

This is free software; you can redistribute it and/or modify it under
the same terms as the Perl 5 programming language system itself.

=cut


__END__

